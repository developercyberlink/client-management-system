<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        $prefix = explode('/', URL::current())[3];

        if (! $request->expectsJson()) {
            if($prefix=="admin"){
                return route('admin.login');
            }else{
                return route('login');
            }
        }
    }
}
