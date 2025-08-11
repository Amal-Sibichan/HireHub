<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Job;
use App\Models\Application;

class Employer extends Controller
{
    public function Showregister()
    {
        return view('Employer.Eregister');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'pho' => 'required',
            'pass' => ['required',Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised()],
        ]);

        Organization::create([
        'name'=>request('name'),
        'email'=>request('email'),
        'password'=>request('pass'),
        'phone'=>request('pho'),    
    ]);
     return redirect()->route('u.login')->with('message','Registered sucessfully');
    }

    public function dashboard()
    {
        return view('Employer.Emphome');
    }

    public function logout()
    {
        Auth::guard('Organization')->logout();
        return redirect()->route('loginpage');
    }




}
