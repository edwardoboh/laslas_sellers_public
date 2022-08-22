<?php

namespace App\Providers;

use App\Models\UserManagement\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer(['*'], function ($view){
            $view->with([
                'user' => User::getUser(),
                'userRoles' => User::getUserRoles(),
                'userFullName' => User::getUserFullName(),
                'userProfilePicture' => User::getProfilePicture(),
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
