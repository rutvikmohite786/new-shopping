<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guestcustom');

    }
    public function index()
    {   
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
            if (auth()->guard('admin')->attempt($credentials)) {
                return redirect()->intended('/');
            } else {
                return redirect()->back()->withErrors(['error' => config('const.password_check')]);
            }
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::guard('admin')->logout();
        return Redirect('login');
    }
}
