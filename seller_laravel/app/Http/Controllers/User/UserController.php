<?php

namespace App\Http\Controllers\User;

use App\Models\UserManagement\User;
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
        $breadcrumbs = [];
//        dd(User::getUser());
        return view('modules.user.my_profile', compact('page_title', 'page_description','breadcrumbs','subheader','nav_name','header_title'));
    }
}
