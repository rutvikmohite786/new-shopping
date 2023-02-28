<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GuestCustome
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

        if(Auth::guard('admin')->user()){
            if(request()->is('login') || request()->is('admin/login')){
                return redirect()->route('dashboard');
            }
            if(request()->is('admin/logout')){
                return $next($request);
            }
        }
        if(Auth::guard('web')->user()){
            if(request()->is('login') || request()->is('admin/login')){
                return redirect()->route('user');
            } 
            if(request()->is('logout')){
                return $next($request);
            }
        }
        // if(auth()->guard('admin')->user() && request()->is('login') || request()->is('admin/login')){
        //     return redirect()->route('dashboard');
        // }
        // if(Auth::guard('web')->user() && request()->is('login') || request()->is('admin/login')){
        //    dd('2');
        //     return redirect()->route('user');
        // }  
        // if(Auth::guard('admin')->user() && request()->is('admin/logout')){
        //     return $next($request);
        // }
        // if(Auth::guard('web')->user() && request()->is('logout')){
        //     return $next($request);
        // }
        // if(request()->is('login') && !Auth::guard('web')->user()){
        //     return $next($request);
        // }
        // if(!Auth::guard('admin')->user()){          
        //     return $next($request);
        // }
        if(request()->is('admin/custom-login') || request()->is('custom-login')){
            return $next($request);
        }
        return $next($request);
    }
}

