<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }
   

    public function login(Request $request){
        //dd($request->all)

        $request->validate([
        'email'=>'required',
        'password'=>'required',
        ]);

        if(Auth::attempt($request->only('email','password'))){
            return redirect('dashboard'); 
        }

        return redirect(route('home'))->withError('username and password is not  valid');

    }

    public function register_view(){
        return view('auth.register');
    }

    public function register(Request $request){
      //  dd($request->all());
        $request->validate([
        'name'=>'required',
        'email'=>'required|unique:users|email',
        'password'=>'required|min:6|confirmed',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        if(Auth::attempt($request->only('email','password'))){
            return redirect('dashboard');
        }
        return redirect('register_view')->withErrors('Error');
    }

    public function home(){
        return view('home');
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    } 
    public function forget_password(){
        return view('auth.forget');
    }

    public function forget_passwordPost(Request $request){
       $request->validate([
        'email'=>"required|email|exists:users",
       ]);
       $token=Str::random(64);
       DB::table('password_reset_tokens')->insert([
        'email'=>$request->email,
        'token'=>$token,
        'created_at'=>Carbon::now(),
      ]);
       
      Mail::send('email.reset_email',['token'=>$token],function($message) use($request){
          $message->to($request->email);
          $message->subject("Reset Password");
      });
       
     return  redirect('/forget_password')->with("success","email has been sent successfully");
    // return "email sent successful";
    }

    public function  reset_password($token){
      return view('auth.new_password',compact('token'));
    }

    public function reset_passwordPost(Request $request){
        $request->validate([
       
        'email'=>'required|email|exists:users',
        'password'=>'required|min:6|confirmed',
        'password_confirmation'=>'required',
        ]);

        $fetchToken=DB::table('password_reset_tokens')
        ->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$fetchToken){
           return redirect('/reset_password')->with('error','Invalid');
        }

        User::where('email',$request->email)
        ->update(['password'=>Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email'=>$request->email])->delete();
        return redirect('/')->with('success',"Password Reset Successful");
    }
}
