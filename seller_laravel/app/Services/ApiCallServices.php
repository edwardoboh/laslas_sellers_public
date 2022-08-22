<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class ApiCallServices{
    public $request;

    //send Get API call With Curl Preferred!!!
    public static function getWithBaseCurl($baseUrl, $url, $parameters){
        $accessToken = TokenService::getAccessToken();
        if (isset($parameters['accessToken'])){
            $accessToken = $parameters['accessToken'];
        }
        $ch = curl_init();
        $data = http_build_query($parameters);
        curl_setopt_array($ch, array(
            CURLOPT_URL => $baseUrl.'/'.str_replace(' ','%20',$url).'?'.$data,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_FOLLOWLOCATION => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING => "",
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_TIMEOUT => config('session.request_timeout'),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "Authorization:".$accessToken."",
                "Client-Id:".TokenService::getClientID()."",
            ),
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        if(curl_error($ch)){
            return [
                'status' => '400',
                'message' => curl_error($ch)
            ];
        } else {
            $res = json_decode($response);
        }
        return $res;
    }

    //send POST API call With Curl
    public static function postWithBaseCurl($baseUrl, $url, $parameters)
    {
        $accessToken = TokenService::getAccessToken();
        if (isset($parameters['accessToken'])){
            $accessToken = $parameters['accessToken'];
        }
        $curl = curl_init();
        $data = http_build_query($parameters);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $baseUrl.'/'.str_replace(' ','%20',$url),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "Authorization:".$accessToken."",
                "Client-Id:".TokenService::getClientID()."",
            ),
            CURLOPT_POSTFIELDS => $data,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $res = json_decode($response);
            return $res;
        }

    }

    //send PATCH API call With Curl
    public static function patchWithBaseCurl($baseUrl, $url, $parameters)
    {
        $accessToken = TokenService::getAccessToken();
        if (isset($parameters['accessToken'])){
            $accessToken = $parameters['accessToken'];
        }
        $curl = curl_init();
        $data = http_build_query($parameters);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $baseUrl.'/'.str_replace(' ','%20',$url),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PATCH",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "Authorization:".$accessToken."",
                "Client-Id:".TokenService::getClientID()."",
            ),
            CURLOPT_POSTFIELDS => $data,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $res = json_decode($response);
            return $res;
        }

    }
}
