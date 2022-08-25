<?php

namespace App\Http\Controllers\User;

use App\Models\UserManagement\User;
use App\Services\ApiCallServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController
{
    public function myProfile()
    {
        $nav_name = 'my_profile';
        $header_title = __('words.profile');
        $page_title = User::getUserFullName().'\'s '.__('words.profile');
        $page_description = __('messages.this_is_your_profile');
        $subheader = 'subheader';
        $user = User::getUser();
        $breadcrumbs = [];
        $warning = [];

        //Get Countries
        $countries = [];
        $getCountries = ApiCallServices::getWithBaseCurl(config("app.api_user_manager_url"),'get-countries', []);
        if (!empty($getCountries->status) && $getCountries->status == 200) {
            $countries = $getCountries->data;
        } else {
            $warning[] = __('messages.failed_to_load_countries');
        }

        //Get States
        $states = [];
        $parameters = [
            'filters'=>[
                [
                    'logic' => 'AND',
                    'column' => 'country_id',
                    'value' => !empty($user->country->id)?$user->country->id:''
                ]
            ]
        ];
        $getStates = ApiCallServices::getWithBaseCurl(config("app.api_user_manager_url"),'get-states', $parameters);
        if (!empty($getStates->status) && $getStates->status == 200) {
            $states = $getStates->data;
        } else {
            $warning[] = __('messages.failed_to_load_states');
        }

        //Get LGAs
        $lgas = [];
        $parameters = [
            'filters'=>[
                [
                    'logic' => 'AND',
                    'column' => 'state_id',
                    'value' => !empty($user->state->id)?$user->state->id:''
                ]
            ]
        ];
        $getLgas = ApiCallServices::getWithBaseCurl(config("app.api_user_manager_url"),'get-lgas', $parameters);
        if (!empty($getLgas->status) && $getLgas->status == 200) {
            $lgas = $getLgas->data;
        } else {
            $warning[] = __('messages.failed_to_load_lgas');
        }

        //Get Wards
        $wards = [];
        $parameters = [
            'filters'=>[
                [
                    'logic' => 'AND',
                    'column' => 'lga_id',
                    'value' => !empty($user->lga->id)?$user->lga->id:''
                ]
            ]
        ];
        $getWards = ApiCallServices::getWithBaseCurl(config("app.api_user_manager_url"),'get-wards', $parameters);
        if (!empty($getWards->status) && $getWards->status == 200) {
            $wards = $getWards->data;
        } else {
            $warning[] = __('messages.failed_to_load_wards');
        }

        //Show Warning if any
        if (count($warning)>0){
            Session::flash('warning_toastr', $warning);
        }
        return view('modules.user.my_profile', compact('page_title', 'page_description','breadcrumbs','subheader','nav_name','header_title','countries','states','lgas','wards'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::getUser();
        //Send API request
        $files = [
            [
                'request_name' => 'profile_picture',
                'name' => $_FILES['profile_picture']['name'],
                'file' => $request->file('profile_picture'),
            ],
        ];
        $response = ApiCallServices::postWithGuzzle(config("app.api_user_manager_url"),'users/'.$user->user_id, $request->except('profile_picture'), $files);
        if (!empty($response->status) && $response->status == 200) {
            Session::forget('userDetails');
            Session::put('userDetails', $response->data);
            Session::flash('success', $response->message);
            Session::flash('success_toastr', $response->message);
            return back();
        } elseif (!empty($response->status) && $response->status != 200){
            Session::flash('failed', $response->message);
            Session::flash('failed_toastr', $response->message);
            return back();
        } else {
            Session::flash('failed', __('messages.failed_no_response_found'));
            Session::flash('failed_toastr', __('messages.failed_no_response_found'));
            return back();
        }
    }
}
