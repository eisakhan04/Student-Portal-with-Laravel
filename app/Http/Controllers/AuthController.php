<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Hash;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
//use Mail;
//use App\Mail;
use Illuminate\Support\Facades\Mail;
//use Str;
// please use str path
use Illuminate\Support\Str;


class AuthController extends Controller
{
    // login function in AuthController
   public function login()
    {
        if(!empty(FacadesAuth::check()))
        {
            if(FacadesAuth::user()->user_type==1)
            {
                return redirect('admin/dashboard');
            }
            else if(FacadesAuth::user()->user_type==2)
            {
                return redirect('teacher/dashboard');
            }
            else if(FacadesAuth::user()->user_type==3)
            {
                return redirect('parent/dashboard');
            }
            else if(FacadesAuth::user()->user_type==4)
            {
                return redirect('student/dashboard');
            }
        }
       // dd(Hash::make(123456));
        return view('auth.login');
    }
    // AuthLogin function in AuthController
   public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if(FacadesAuth::attempt(['email'=> $request->email, 'password'=> $request->password, ], $remember))
        {
            if(FacadesAuth::user()->user_type==1)
            {
                return redirect('admin/dashboard');
            }
            else if(FacadesAuth::user()->user_type==2)
            {
                return redirect('teacher/dashboard');
            }
            else if(FacadesAuth::user()->user_type==3)
            {
                return redirect('parent/dashboard');
            }
            else if(FacadesAuth::user()->user_type==4)
            {
                return redirect('student/dashboard');
            }
            
        }
        else
        {
           return redirect()->back()->with('error','Please Enter Correct Email and Password ');
        }
       //dd($request->all());
    }

     // forgotpassword function
    public function forgotpassword()
    {
        return view('auth.forgot');
    }
    public function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        if(!empty($user))
        {
            
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));  
            return redirect()->back()->with('success','Please Check Your Email For Reset Password');
        }
        else{
            return redirect()->back()->with('error','Email not found in system ');
        }
       // dd($user);
        
    }




    // Logout auth
    public function logout()
    {
        FacadesAuth::logout();
         return redirect(url(''));
    }
}
