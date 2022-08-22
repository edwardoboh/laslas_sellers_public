<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Authentication\AuthenticationController;
use App\Models\UserManagement\User;
use App\Services\ApiCallServices;
use App\Services\TokenService;
use Closure;
use Illuminate\Support\Facades\Session;

class CheckRole
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
        //If UserRoles Session does not exist create it
        if (!Session::has('userRoles')){
            $user_id = TokenService::getUserIdFromAccessToken();
            //Send API request to get user's roles
            $response = ApiCallServices::postWithBaseCurl(config("app.api_authorization_url"),'get-user-roles/'.$user_id, []);
            if (!empty($response->status) && $response->status == 200) {
                Session::put('userRoles', $response->data);
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
        $userRoles = User::getUserRoles();
        $actions = $request->route()->getAction();
        $roles = isset($actions[0]['roles']) ? $actions[0]['roles'] : null;
        if (count($userRoles) > 0){
            for($i=0;$i<count($roles);$i++){
                foreach ($userRoles as $role){
                    $role = (object)$role;
                    if ($roles[$i] == $role->name){
                        return $next($request);
                    }
                }
            }
        } else {
            $response_revoke = AuthenticationController::revokeSession();
            \Cookie::queue(\Cookie::forget('accessToken'));
            Session::flash('failed', 'Your Session was revoked! No Role Found.' );
            return redirect('/login')->with('message', $response_revoke);
        }
        return abort('403');
    }
}
