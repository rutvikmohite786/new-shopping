<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\NewuserMail;
use App\Mail\passwordResetMail;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Jobs\NewUserJob;
use App\Jobs\UserPasswordResetJob;


class UserManageController extends Controller
{
    public function index(Request $request){
      $user = User::with('status')->paginate(config('const.pagination'));
      return view('form.user.index', compact('user'));
    }
    public function store(Request $request){
      $validated = $request->validate([
        'email' => 'required|max:255|unique:users',
        'name' => 'required',
      ]);
      $random = Str::random(10);
      $password = Hash::make($random);
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $password;
      $user->status_id = 1;
      $user->save();
      $details = [
        'email' => $request->email,
        'password' => $random,
        'name'=>$request->name
      ];
    //  Mail::to('testreceiver@gmail.com')->send(new NewuserMail($details));
      dispatch(new NewUserJob($details));
      return redirect()->route('index.user')->with('message','Register user');
    }
    public function add(){
      return view('form.user.add');
    }
    public function edit($id)
    {
      $user = User::find($id);
      $status = UserStatus::all();
      return view('form.user.update',compact('user','status'));
    }
    public function update(Request $request){
      $validated = $request->validate([
        'email' => 'unique:users,email,'.$request->id,
        'name' => 'required',
        'status'=>'required'
      ]);
      $user = User::find($request->id);
      $user->name  = $request->name;
      $user->email = $request->email;
      $user->status_id = $request->status;
      $user->save();
      return redirect()->route('index.user')->with('message','User has been updated');      
    }
    public function delete($id){
       User::where('id',$id)->delete();
       return redirect()->route('index.user')->with('error','User has been deleted');
    }
    public function passwordReset($id){
      $user = User::find($id);
      $token = Str::random(30);
      $details = [
        'email' => $user->email,
        'name'=>$user->name,
        'token' => $token
      ];
      DB::table('password_resets')->insert(
        ['email' => $user->email, 'token' => $token]
      );
   //   Mail::to('testreceiver@gmail.com')->send(new passwordResetMail($details));
      dispatch(new UserPasswordResetJob($details));
      return redirect()->route('index.user')->with('message','Password reset link send susscessfully');
    }
    public function passwordVerify($email,$token){
      $email = $email;
      $token = $token;
      return view('auth.passwords.reset',compact('email','token'));
    }
    public function passwordChange(Request $request){
      $validated = $request->validate([
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6'
      ]);
      $checkToken = DB::table('password_resets')->where('token',$request->token)->where('email',$request->email)->exists();
      if($checkToken){
          $userPassword= User::where('email',$request->email)->first();
          $userPassword->password = Hash::make($request->password);
          $userPassword->save();
          return redirect()->route('login');
      }
    }
}

