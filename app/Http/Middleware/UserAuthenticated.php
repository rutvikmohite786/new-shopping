<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticated
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
        if(!Auth::guard('admin')->user() && !Auth::guard('web')->user()){
            return redirect(route('admin.login'));
        }
        if (Auth::guard('web')->user()) {
            return $next($request);
        }
        if (Auth::guard('admin')->check()) {
            abort(401);
        }
        if ($request->ajax() || $request->wantsJson()) {
            abort(401);
        }
    }
}
