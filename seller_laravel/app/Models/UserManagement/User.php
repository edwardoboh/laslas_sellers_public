<?php

namespace App\Models\UserManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    public static function getUser()
    {
        //Getting user details from session
        if (Session::has('userDetails')){
            return (object)Session::get('userDetails');
        } else {
            return false;
        }
    }

    public static function getUserFullName()
    {
        //Getting user details from session
        if (Session::has('userDetails')){
            $user = (object)Session::get('userDetails');
            return $user->first_name.' '.$user->middle_name.' '.$user->last_name;
        } else {
            return false;
        }
    }

    public static function getUserRoles()
    {
        //Getting user details from session
        if (Session::has('userRoles')){
            return Session::get('userRoles');
        } else {
            return false;
        }
    }

    public static function getProfilePicture()
    {
        //Getting user details from session
        if (self::getUser() && self::getUser()->profile_picture){
            if (isset(self::getUser()->profile_picture['file_secure_path'])){
                return self::getUser()->profile_picture['file_secure_path'];
            } else {
                return 'assets/media/users/default.jpg';
            }
        } else {
            return 'assets/media/users/default.jpg';
        }
    }
}
