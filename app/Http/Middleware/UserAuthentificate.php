<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;


class UserAuthentificate
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

        if(auth()->user()->Admin || auth()->user()->SuperAdmin){
            return redirect()->route('administration.panel');
        }
        if(auth()->user()->Compte_ban){
           auth()->logout();
           return redirect()->route('accueil');
        }else{
            return $next($request);
        }

    
    }
}
