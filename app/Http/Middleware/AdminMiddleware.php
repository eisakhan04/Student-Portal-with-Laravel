<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty(FacadesAuth::check()))
            {
                 if(FacadesAuth::user()->user_type == 1)
                 {
                    return $next($request);
                 }
                 else
                 {
                    FacadesAuth::logout();
                     return redirect('');
                 }
            }
        else{
            FacadesAuth::logout();
              return redirect(url(''));
        }    
    
    }
}
