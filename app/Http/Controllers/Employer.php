<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mockery\Generator\StringManipulation\Pass\Pass;
use phpDocumentor\Reflection\Types\Mixed_;
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
     return redirect()->route('loginpage')->with('message','Registered sucessfully');
    }

    public function dashboard()
    {
        return view('Employer.Emphome');
    }


   public function ogdetials($id)
   {
    $org=Organization::find($id);
    return  view('admin.Org_detials', compact('org'));
   }

  public function profile()
  {
    $org=Auth::guard('Organization')->user();
    return view('Employer.Empprofile',compact('org'));

  }
  public function updateform()
  {
    $org=Auth::guard('Organization')->user();
    return view('Employer.update_profile',compact('org'));
  }
  public function update(Request $update)
  {
    $update->validate([
      'name' => 'required',
      'email' => 'required|email',
      'pho' => 'required|max:10|min:10', 
      'add' => 'required',
      'city' => 'required',
      'state' => 'required',
      'about' => 'required',

    ]);
    $us=Auth::guard('Organization')->user();
    $org=Organization::find($us->org_id);
    $path = $update->file('img') ? $update->file('img')->store('Picture', 'public') : $org->logo;
    $id_path = $update->file('idty') ? $update->file('idty')->store('Idproof', 'public') : $org->identity;
    $org->update([
      'name' => request('name'),
      'email' => request('email'),
      'phone' => request('pho'),
      'logo' => $path,
      'identity' => $id_path,
      'address' => request('add'),
      'city' => request('city'),
      'state' => request('state'),
      'description' => request('about'),
   
    ]);
    return view('Employer.Empprofile',compact('org'));

  }
  
  public function jobform()
  {
    $org=Auth::guard('Organization')->user();
    $emp=Organization::find($org->org_id);
    if($org->is_approved === 'approved')
    {
      return view('Employer.jobupdate',compact('org'));
    }
    elseif($org->is_approved === 'waiting')
    {
      return redirect()->back()->with('message','please waite for approvel');
    }
    else
    {
      return redirect()->route('Emp.updateform')->with('message','complete your profile');
    }
  }

  public function Add(Request $req)
  {

    $req->validate([
      'name' => 'required',
      'email' => 'required|email',
      'pho' => 'required', 
      'add' => 'required',
      'city' => 'required',
      'state' => 'required',
      'idty' => 'required',
      'about' => 'required',

    ]);


    $org=Auth::guard('Organization')->user();
    Job::create([
      'name'=>request('name'),
      'org_id'=>$org->org_id,
      'description'=>request('desc'),
      'skills'=>request('skill'),
      'Education'=>request('edu'),
      'city'=>request('city'),
      'salary'=>request('salary'),
      'due'=>request('due'),

    ]);

    return redirect()->route('Emp.dashboard')->with('message','Registered sucessfully');
    
  }






    public function logout()
    {
        Auth::guard('Organization')->logout();
        return redirect()->route('loginpage');
    }




}
