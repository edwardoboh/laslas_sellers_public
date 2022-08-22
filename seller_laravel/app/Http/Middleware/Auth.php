<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Authentication\AuthenticationController;
use App\Models\UserManagement\User;
use App\Services\ApiCallServices;
use App\Services\TokenService;
use Closure;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Getting the access token
        $access_token = TokenService::getAccessToken();
        //if token does not exit OR user session does not exist
        if(!$access_token){
            //send this api get call to revoke the token from the database
            if (Session::has('accessToken')){
                AuthenticationController::revokeSession();
            }
            \Cookie::queue(\Cookie::forget('accessToken'));
            return redirect('/login');
        } else {
            //Check Auth
            $response = ApiCallServices::postWithBaseCurl(config("app.api_auth_url"),'checkAuth', []);
            if (empty($response->status)) {
                Session::flash('failed', 'Failed to get Auth Status.' );
                return back();
            } elseif (!empty($response->status) && $response->status != 200){
                Session::flash('failed', $response->message);
                return redirect('/logout')->with('message', $response->message);
            }
            //check user's idle time

            //If User Session does not exist create it
            if (!Session::has('userDetails')){
                $user_id = TokenService::getUserIdFromAccessToken();
                //Send API request to get user's details
                $response = ApiCallServices::getWithBaseCurl(config("app.api_user_manager_url"),'users/'.$user_id, []);
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
            }
            return $next($request);
        }
    }
}
