<?php

namespace App\Http\Controllers\User;

use App\Models\UserManagement\User;
use App\Services\ApiCallServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController
{
    public $sub_pages = [
        'home',
        'password',
        'email'
    ];

    public function myProfile($page = 'home')
    {
        $page = in_array($page, $this->sub_pages) ? $page : "home";
        $profile = User::getProfile();

        $nav_name = 'profile';
        $header_title = __('words.profile');
        $page_title = __('messages.welcome', ['name' => User::getUserFullName()]);
        $page_description = __('messages.welcome', ['name' => User::getUserFullName()]);
        $subheader = 'subheader';
        $breadcrumbs = [];

        //Get Countries
        $countries = [];
        $getCountries = ApiCallServices::getWithBaseCurl(config("app.api_user_manager_url"), 'get-countries', []);
        if (!empty($getCountries->status) && $getCountries->status == 200) {
            $countries = $getCountries->data;
        }

        $payload =  compact('profile', 'countries', 'page', 'page_title', 'page_description', 'breadcrumbs', 'subheader', 'nav_name', 'header_title');
        return view('modules.user.my_profile', $payload);
    }

    public function updateProfile(Request $request)
    {
        // dd($request->all());
        $response = ApiCallServices::postWithBaseCurl(config("app.api_auth_url"), 'verify-onetime-login', $request->all());
        dd($response);
        if (!empty($response->status) && $response->status == 200) {
            return $this->saveUserLoginSessions($response->data);
        } elseif (!empty($response->status) && $response->status != 200) {
            Session::flash('failed', $response->message);
            Session::flash('failed_toastr', $response->message);
            return back();
        } else {
            Session::flash('failed', 'Failed! No response found. Please try again.');
            Session::flash('failed_toastr', 'Failed! No response found. Please try again.');
            return back();
        }
    }
}

        // // Get State
        // $parameters = ['filters' => [['logic' => 'AND', 'column' => 'country_id', 'value' => $countries->id || 0]], 'data' => 'less'];
        // $getStates = ApiCallServices::getWithBaseCurl(config("api.api_user_manager_url"), 'get-states', $parameters);

        // // dd($getStates);