<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Skills;
use App\Models\Academics;
use App\Models\Experience;


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
      $user = session('user');
      return view('index', compact('user'));
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
     $user = User::where('email', $mail)->first();
     if(Auth::attempt(['email'=>$mail,'password'=>$pass]))
     {
      return redirect()->route('index')->with('message','Login sucessfully');
    //   return view('index', compact('user'));
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
    return redirect()->route('loginpage')->with('message','Logout sucessfully');
   }



   public function edit()
   {
       $uid = Auth::user()->user_id;
       // Eager load the skills relationship to avoid null errors
       $user = User::with('skills')->findOrFail($uid);
       $allSkills = Skills::all();
       
       return view('edit', compact('user', 'allSkills'));
   }



   public function Userprofile()
   {
       $uid = Auth::user()->user_id;
       // Eager load the skills relationship to avoid null errors
       $user = User::with('skills')->findOrFail($uid);
       $allSkills = Skills::all();
       $edu=Academics::where('us_id',$uid)->get();
       $exp=Experience::where('xus_id',$uid)->get();
       return view('UserProfile', compact('user', 'allSkills','edu','exp'));
   }
   

                                              //UPDTAE USER PROFILE

   public function update(Request $update)
   {
       $uid = decrypt(request('user_id'));
       $user = User::find($uid);
       $path = $update->file('img') ? $update->file('img')->store('Picture', 'public') : $user->image;
       $res_path = $update->file('res') ? $update->file('res')->store('Resume', 'public') : $user->resume;
       
       // Get the current password if no new password is provided
       $password = request('password') ? bcrypt(request('password')) : $user->password;
       
       $user->update([
           'name' => request('name'),
           'email' => request('email'),
           'password' => $password,
           'phone' => request('pho'),
           'image' => $path,
           'resume' => $res_path,
           'city' => request('city'),
           'state' => request('state'),
           'address' => request('add'),
           'About' => request('about'),
           'Prof'  => request('pro'),
            ]);
       
       return redirect()->route('edit.user', encrypt($uid))->with('message','Updated sucessfully');
   }


   public function updateEdu()
   {   

       $uid = Auth::user()->user_id;
       // Eager load the skills relationship to avoid null errors
       $user = User::with('skills')->findOrFail($uid);
       $allSkills = Skills::all();
       
       return view('userEducation', compact('user', 'allSkills'));
   }


   public function storeEdu(Request $edu)
   {
    $id=Auth::user()->user_id;
    $edu->validate([

        'lev'=>'required',
        'inst'=>'required',
        'course'=>'required',
        'eduStart'=>'required|date',
        'eduEnd'=>'nullable|date|after_or_equal:eduStart',
    ]);

    Academics::create([
        'us_id' => $id,
        'Level' => request('lev'),
        'institute' => request('inst'),
        'Course' => request('course'),
        'start' => request('eduStart'),
        'end' => request('eduEnd'),
    ]);

    return redirect()->route('update.edu')->with('message','Updated sucessfully');

   }

   public function updateExp()
   {   

       $uid = Auth::user()->user_id;
       // Eager load the skills relationship to avoid null errors
       $user = User::with('skills')->findOrFail($uid);
       $allSkills = Skills::all();
       
       return view('userExperience', compact('user', 'allSkills'));
   }

public function storeExp(Request $exp)
{

    $uid = Auth::user()->user_id;
    $exp->validate([
        'title'=>'required',
        'company'=>'required',
        'description'=>'required',
        'expStart'=>'required|date',
        'expEnd'=>'nullable|date|after_or_equal:expStart',  
    ]);

    Experience::create([
        'xus_id' => $uid,
        'position' => request('title'),
        'company' => request('company'),
        'discp' => request('description'),
        'start' => request('expStart'),
        'end' => request('expEnd'),
    ]);

    return redirect()->route('update.exp')->with('message','Updated sucessfully');
}








}
