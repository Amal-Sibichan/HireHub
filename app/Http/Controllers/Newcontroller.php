<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;
use phpDocumentor\Reflection\Types\Mixed_;
class Newcontroller extends Controller
{
   public function index()
   {
    return view('index');
   }
   public function job_listing()
   {
    return view('job_listing');
   }
   public function about()
   {
    return view('about');
   }
   public function blog()
   {
    return view('blog');
   }
   public function single_blog()
   {
    return view('single_blog');
   }
   public function elements()
   {
    return view('elements');
   }
   public function job_details()
   {
    return view('job_details');
   }
   public function contact()
   {
    return view('contact');
   }
   public function registerpage()
   {
      return view('login', ['registerView' => true]);
   }

   public function newuser(Request $request)
   {
      $request->validate([
         'name'=>'required|max:255',
         'email'=>'required|email|unique:users,email',
         'pho'=>'required|max:10|min:10',
         'pass'=>['required',Password::min(8)
              ->mixedCase()
              ->letters()
              ->numbers()
              ->symbols()
              ->uncompromised()
             ],
     ]);
     $name = request('name');
     $mail = request('email');
     $pass = request('pass');
     $ph = request('pho');

         User::create([
         'name'=>$name,
         'email'=>$mail,
         'password'=>$pass,
         'phone'=>$ph,    
     ]);
      return redirect()->route('loginpage')->with('message','Registered sucessfully');
   }


   public function loginpage()
   {
    return view('login');
   }
   public function login(Request $request)
   {
      $request->validate([
         'Email'=>'required|email',
         'Pass'=>'required',
     ]);
     $mail = request('Email');
     $pass = request('Pass');
     if(Auth::attempt(['email'=>$mail,'password'=>$pass]))
     {
      return redirect()->route('index');
     }
     else
     {
      return back()->withErrors([
        'Pass'=>"invalid credentials",
      ]);
     }
   }
   public function logout()
   {
    Auth::logout();
    return redirect()->route('loginpage');
   }
}
