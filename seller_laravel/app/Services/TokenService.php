<?php
namespace App\Services;

use Illuminate\Support\Facades\Session;

class TokenService {
    // Get AccessToken From Cookie
    public static function getAccessToken(){
        return request()->cookie('accessToken');
    }

    public static function getUserIdFromAccessToken(){
        $token = str_replace("Bearer ","", self::getAccessToken());
        $auth_header = explode('.', $token);
        $token_header_json = base64_decode($auth_header[1]);
        $token_header_array = json_decode($token_header_json, true);
        return $token_header_array['sub'];
    }

    public static function getClientID()
    {
        return config('app.client_id');
    }
}
