<?php

namespace App\Http\Middleware;

use Closure;

class StatusCheckMiddleware
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
        if (auth()->user() !== null){
            if (auth()->user()->status == 0){
                auth()->logout();
                return redirect()->route('web.login')->with('error', 'Hesabınız askıya alınmıştır. Lütfen yönetici ile iletişime geçiniz.');
            }
        }

        return $next($request);
    }
}
