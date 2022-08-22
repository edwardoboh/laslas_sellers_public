<?php

namespace App\Http\Middleware;

use App\Services\TokenService;
use Closure;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class Guest
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
        //if token does
        if($access_token){
            return redirect()->route('home');
        } else {
            return $next($request);
        }
    }
}
