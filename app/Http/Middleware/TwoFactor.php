<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TwoFactor
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if(auth()->check() && $user->two_factor_code)
        {
            if($user->two_factor_expires_at->lt(now()))
            {
                //$user->resetTwoFactorCode();
                auth()->logout();

                return redirect()->route('login')->withMessage('The two factor code has expired. Please login again.');
            }

            if(!$request->is('verify*'))
            {
                return redirect()->route('verify.index');
            }
        }

        return $next($request);
    }
}
