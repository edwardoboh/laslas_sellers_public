<?php

namespace App\Http\Controllers\Authentication;

use App\Jobs\getCountries;
use App\Services\ApiCallServices;
use App\Services\TokenService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController
{
    //Login
    public function login(Request $request)
    {
        $page_title = 'Seller\'s Login';
        $page_description = 'Login into the LasLas Seller\'s Platform.';
        return view('modules.authentication.login', compact('page_title', 'page_description'));
    }

    public function signIn(Request $request)
    {
        if (Session::has('accessToken') && Session::has('userDetails') && Session::has('userRoles')){
            $cookie = cookie('accessToken', "Bearer ".Session::get('accessToken'));
            return redirect()->route('home')->cookie($cookie);
        } else {
            return redirect('login');
        }
    }

    // Onetime Login
    public function resetPasswordOnetimeLogin(Request $request)
    {
        //Send API request to this register user
        $response = ApiCallServices::postWithBaseCurl(config("app.api_auth_url"),'forgot-password-onetime-login', $request->all());
        if (!empty($response->status) && $response->status == 200) {
            return $response;
        } elseif (!empty($response->status) && $response->status != 200){
            Session::flash('failed', $response->message);
            Session::flash('failed_toastr', $response->message);
            return back();
        } else {
            Session::flash('failed', 'Failed! No response found. Please try again.');
            Session::flash('failed_toastr', 'Failed! No response found. Please try again.');
            return back();
        }
    }

    public function verifyOnetimeLogin(Request $request)
    {
        //Send API request
        $response = ApiCallServices::postWithBaseCurl(config("app.api_auth_url"),'verify-onetime-login', $request->all());
        if (!empty($response->status) && $response->status == 200) {
            return $this->saveUserLoginSessions($response->data);
        } elseif (!empty($response->status) && $response->status != 200){
            Session::flash('failed', $response->message);
            Session::flash('failed_toastr', $response->message);
            return back();
        } else {
            Session::flash('failed', 'Failed! No response found. Please try again.');
            Session::flash('failed_toastr', 'Failed! No response found. Please try again.');
            return back();
        }
    }

    //Google Login
    public function googleLogin(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLoginCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();
        //Send API request
        $parameters = [
            'name' => $user->name,
            'email' => $user->email,
            'role_name' => 'Seller',
            'user_agent' => $request->server('HTTP_USER_AGENT')
        ];
        $response = ApiCallServices::postWithBaseCurl(config("app.api_auth_url"),'socialAuth', $parameters);
        if (!empty($response->status) && $response->status == 200) {
            return $this->saveUserLoginSessions($response->data);
        } elseif (!empty($response->status) && $response->status != 200){
            Session::flash('failed', $response->message);
            Session::flash('failed_toastr', $response->message);
            return redirect('/login');
        } else {
            Session::flash('failed', 'Failed! No response found. Please try again.');
            Session::flash('failed_toastr', 'Failed! No response found. Please try again.');
            return redirect('/login');
        }
    }

    //Login
    public function saveUserLoginSessions($user)
    {
        //Save Token to session
        Session::put('accessToken', $user->access_token);

        //Send API request to get user's details
        $parameters = [
            'accessToken' => $user->access_token,
        ];
        $response = ApiCallServices::getWithBaseCurl(config("app.api_user_manager_url"),'users/'.$user->id, $parameters);
        if (!empty($response->status) && $response->status == 200) {
            Session::put('userDetails', $response->data);
        } elseif (!empty($response->status) && $response->status != 200){
            Session::flash('failed', $response->message);
            Session::flash('failed_toastr', $response->message);
            return back();
        } else {
            Session::flash('failed', 'Failed! No response found. Please try again.');
            Session::flash('failed_toastr', 'Failed! No response found. Please try again.');
            return back();
        }

        //Send API request to get user's roles
        $parameters = [
            'accessToken' => $user->access_token,
        ];
        $response1 = ApiCallServices::postWithBaseCurl(config("app.api_authorization_url"),'get-user-roles/'.$user->id, $parameters);
        if (!empty($response1->status) && $response1->status == 200) {
            Session::put('userRoles', $response1->data);
        } elseif (!empty($response1->status) && $response1->status != 200){
            Session::flash('failed', $response1->message);
            Session::flash('failed_toastr', $response1->message);
            return back();
        } else {
            Session::flash('failed', 'Failed! No response found. Please try again.');
            Session::flash('failed_toastr', 'Failed! No response found. Please try again.');
            return back();
        }

        return redirect('signin');
    }

    //Register
    public function register(Request $request)
    {
        $countries = [];
        $categories = [];
        $banks = [];
        $page_title = 'Seller\'s Registration';
        $page_description = 'Register as a seller on LasLas Seller\'s Platform. The best e-commerce site in Africa.';

        //Get Countries
        $getCountries = ApiCallServices::getWithBaseCurl(config("app.api_user_manager_url"),'get-countries', []);
        if (!empty($getCountries->status) && $getCountries->status == 200) {
            $countries = $getCountries->data;
        }
        //Get Parent Categories
        $parameters = [
            'filters' => [
                [
                    'logic' => 'AND',
                    'column' => 'parent_id',
                    'value' => ''
                ]
            ],
            'data' => 'less'
        ];
        $getCategories = ApiCallServices::getWithBaseCurl(config("app.api_category_url"),'get-categories', $parameters);
        if (!empty($getCategories->status) && $getCategories->status == 200) {
            $categories = $getCategories->data;
        }
        //Get Banks
        $getBanks = ApiCallServices::getWithBaseCurl(config("app.api_user_manager_url"),'get-banks', []);
        if (!empty($getBanks->status) && $getBanks->status == 200) {
            $banks = $getBanks->data;
        }
        return view('modules.authentication.register', compact('page_title', 'page_description', 'countries','categories','banks'));
    }

    public function registerStore(Request $request)
    {
        //Send API request
        $response = ApiCallServices::postWithBaseCurl(config("app.api_user_manager_url"),'users/register', $request->all());
        if (!empty($response->status) && $response->status == 200) {
            //Get User Role
            $roles = [];
            $parameters = [
                'accessToken' => $response->data->access_token
            ];
            $userRole = ApiCallServices::postWithBaseCurl(config("app.api_authorization_url"),'get-user-roles/'. $response->data->id, $parameters);
            if (!empty($userRole->status) && $userRole->status == 200){
                $roles = $userRole->data;
            }
            //create token cookie & sessions
            Session::put('user', ['user_details'=>$response->data, 'roles'=>$roles]);
            Session::put('accessToken', 'Bearer '.$response->data->access_token);
            $cookie = cookie('accessToken', "Bearer ".$response->data->access_token);
            return redirect()->route('home')->cookie($cookie);
        } elseif (!empty($response->status) && $response->status != 200){
            Session::flash('failed', $response->message);
            Session::flash('failed_toastr', $response->message);
            return back();
        } else {
            Session::flash('failed', 'Failed! No response found. Please try again.');
            Session::flash('failed_toastr', 'Failed! No response found. Please try again.');
            return back();
        }
    }

    public static function revokeSession()
    {
        try {
            $parameters = [
                'accessToken' => Session::get('accessToken')
            ];
            $response = ApiCallServices::postWithBaseCurl(config("app.api_auth_url"),'logout', $parameters);
            if (!empty($response->status) && $response->status == 200) {
                return redirect('/logout')->with('message', $response->message);
            } else {
                return redirect('/logout');
            }
        } catch (\Throwable $th) {
            return redirect('/logout');
        }
    }

    public function logout()
    {
        try {
            $response = ApiCallServices::postWithBaseCurl(config("app.api_auth_url"),'logout', []);
//            if (!empty($response->status) && $response->status == 200){}
            \Cookie::queue(\Cookie::forget('accessToken'));
            //Deleting all sessions
            Session::forget([
                'accessToken',
                'userDetails',
                'userRoles',
                'last_activity',
                '_token',
            ]);
            Session::flash('info_toastr', 'Logged out successfully.');
            return redirect('/login');
        } catch (\Throwable $th) {
            $message = \json_encode($th->getMessage(), true);
            return ['status'=>400, 'response'=>$message];
        }
    }

    public function saveToSession(Request $request)
    {
        if ($request->session_function == 'has'){
            Session::has($request->session_name);
        }
        if ($request->session_function == 'put'){
            Session::put($request->session_name, $request->session_value);
        }
        if ($request->session_function == 'forget'){
            Session::forget($request->session_name);
        }
        if ($request->session_function == 'get'){
            Session::get($request->session_name);
        }
        return 'done';
    }

}
