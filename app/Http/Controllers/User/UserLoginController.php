<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Socialite;
use App\Jobs\NewUserJob;

class UserLoginController extends Controller
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
            if (auth()->guard('web')->attempt($credentials)) {
                return redirect()->intended('/user/new');
            } else {
                return redirect()->back()->withErrors(['error' => config('const.password_check')]);
            }
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        return redirect("/login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        $details = [
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name'=>$data['name'],
            'status_id'=>1
        ];
        dispatch(new NewUserJob($details));
        return User::create($details);
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
        Auth::logout();
        return Redirect('login');
    }

    //scoial login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('provider_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/user/new');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'provider_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'status_id'=>1
                ]);
    
                Auth::login($newUser);
                return redirect('/user/new');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
