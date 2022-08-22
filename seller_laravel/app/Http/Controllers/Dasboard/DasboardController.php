<?php

namespace App\Http\Controllers\Dasboard;

use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DasboardController
{
    public function index()
    {
        $nav_name = 'dashboard';
        $header_title = __('words.dashboard');
        $page_title = __('messages.welcome', ['name' => User::getUserFullName()]);
        $page_description = __('messages.welcome', ['name' => User::getUserFullName()]);
        $subheader = 'subheader';
        $breadcrumbs = [];
        return view('modules.dashboard.index', compact('page_title', 'page_description','breadcrumbs','subheader','nav_name','header_title'));
    }
}
