<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Job;
use App\Models\User;

use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Pail\ValueObjects\Origin\Console;
use Mockery\Generator\StringManipulation\Pass\Pass;
use phpDocumentor\Reflection\Types\Mixed_;
use Yajra\DataTables\Facades\DataTables;

class Employer extends Controller
{

  public function index()
  {
    $jobs = Job::where('org_id',Auth::guard('Organization')->user()->org_id)->get();
      return view('Employer.Eindex',compact('jobs'));
  }
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

    if($org->iscomplete())
    {
      $org->is_approved='waiting';
      $org->save();
    } 
   
    return response()->json(['success' => ' Updated successfully']);
    // return view('Employer.Empprofile',compact('org'));

  }
  
  public function jobform()
  {
    $org=Auth::guard('Organization')->user();
    $emp=Organization::find($org->org_id);
    if($org->is_approved === 'approved')
    {
      return view('Employer.jobupdate',compact('org'));
    }
    else
    {
      $message = $org->is_approved === 'waiting' 
      ? 'Please wait for approval.' 
      : 'Please complete your profile first.';

      session()->flash('message', $message);

        // Redirect to the previous page or dashboard
        return redirect()->route('Emp.index');
    }
  }

  public function Add(Request $req)
  {
    $req->validate([
      'name' => 'required',
      'desc' => 'required',
      'skill' => 'required',
      'edu' => 'required',
      'city' => 'required',
      'salary' => 'required|numeric',
      'category' => 'required',
      'type' => 'required',
      'due' => 'required',

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
      'category'=>request('category'),
      'type'=>request('type'),
      'due'=>request('due'),

    ]);
    return response()->json(['success' => 'Job added successfully']);
    // return redirect()->route('Emp.dashboard')->with('message','Registered sucessfully');
  }
 

  public function showjobs()
  {
    return view('Employer.jobs');
  }

  public function jobs()
  {
    $us=Auth::guard('Organization')->user();
    $jobs =Job::where('org_id',$us->org_id);
    return DataTables::of($jobs)
      ->addColumn('action',function($row){
        $btn='<a href="#" data-id="'.$row->j_id.'"  class="btn btn-sm btn-primary" id="viewbtn">Applications</a>';
        return $btn;
      })
      ->rawColumns(['action'])
      ->make(true);
  }

  public function apppage()
  {
    return view('Employer.application');
  }

  public function applist($id)
  {
    
      
    $applications=Application::where('job_id', $id)->with(['jobs', 'users']);
    return DataTables::eloquent($applications)
    ->addColumn('job_title', fn($app) => $app->jobs->name ?? 'N/A')
    ->addColumn('user_name', fn($app) => $app->users->name ?? 'N/A')
    ->addColumn('email', fn($app) => $app->users->email ?? 'N/A')
    ->addColumn('action', fn($app) => '<a href="#" data-id="'.$app->u_id.'"  class="btn btn-sm btn-primary" id="applicants">Detials</a>')
    ->filterColumn('user_name', function($query, $keyword) {
      $query->whereHas('users', function($q) use ($keyword) {
          $q->where('name', 'like', "%{$keyword}%");
      });
  })
    ->rawColumns(['action']) // allows HTML in action column
    ->toJson();
     
  }

   
  public function view_applicants($id)
  {
    $applicant=User::with(['education','experience'])->findOrFail($id);
    return view('Employer.applicants',compact('applicant'));
  }






    public function logout()
    {
        Auth::guard('Organization')->logout();
        return redirect()->route('loginpage');
    }




}
