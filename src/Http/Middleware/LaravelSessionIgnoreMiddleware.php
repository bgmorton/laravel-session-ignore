<?php

namespace bgmorton\LaravelSessionIgnore\Http\Middleware;

use Illuminate\Support\Facades\Config;
use Closure;

class LaravelSessionIgnoreMiddleware
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $agents = config('laravel-session-ignore.user_agents', []);
        if(!is_array($agents)) $agents = [];// Ensure an array in case the user has set the config value incorrectly

        if (request()->header('User-Agent') && in_array(request()->header('User-Agent'), $agents) !== false) {
            
            //Uncomment to check middleware reading config/is loaded
            // print_r($agents);
            // echo config('laravel-session-ignore.session_driver', 'array');
            // echo config('laravel-session-ignore.session_lifetime', 3000);
            
            Config::set('session.driver', config('laravel-session-ignore.session_driver', 'array'));
            Config::set('session.lifetime', config('laravel-session-ignore.session_lifetime', 3000));
        }

        return $next($request);
    }
}