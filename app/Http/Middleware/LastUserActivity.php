<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;

class LastUserActivity
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            $expiresAt = Carbon::now()->addMinute(15);// TODO imp info You Can E
            Cache::put('user-is-online-'. Auth::user()->id,true, $expiresAt);
        }
        return $next($request);
    }
}
