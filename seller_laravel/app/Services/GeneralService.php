<?php
namespace App\Services;

class GeneralService {
    public static function generateRandomString($length) {
        $key = '';
        $keys = array_merge(range('a', 'z'), range(0, 9), range('A', 'Z'));
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

    public static function generateRandomString_numbers_only($length) {
        $key = '';
        $keys = array_merge(range(0, 9));
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }
}
