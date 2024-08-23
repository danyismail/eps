<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;

class UserSession
{

    public function handle($request, Closure $next)
    {
        if ($request->session()->exists('userdata')) {
            if($request->session()->get('userdata')['expires_at'] >= strtotime("now")) {
                return $next($request);
            } else {
                $request->session()->forget('userdata');
                return redirect('/login');
            }
        } else {
            $request->session()->forget('userdata');
            return redirect('/login');
        }
    }

}
