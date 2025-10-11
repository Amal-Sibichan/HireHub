<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Job;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Application;
use App\Models\OrgImages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Pail\ValueObjects\Origin\Console;
use Mockery\Generator\StringManipulation\Pass\Pass;
use phpDocumentor\Reflection\Types\Mixed_;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
class Employer extends Controller
{

  // function for employer dashboard

  public function index()
  {
    $jobs = Job::with('application')->where('org_id',Auth::guard('Organization')->user()->org_id)->get();
    $applications=Application::where('or_id',Auth::guard('Organization')->user()->org_id)->get();
    $activeJobs =$jobs->filter(fn($job) => $job->due >= Carbon::now())->count();
    $reviews=Feedback::with('user')->where('og_id',Auth::guard('Organization')->user()->org_id)->latest()->take(5)->get();
      return view('Employer.Eindex',compact('jobs','reviews','applications','activeJobs'));
  }

  // function for employer register page

    public function Showregister()
    {
        return view('Employer.Eregister');
    }

    // function for employer register

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => ['required',Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised()],
            'confirmPassword'=>'required|same:password',
        ]);

        Organization::create([
        'name'=>request('name'),
        'email'=>request('email'),
        'password'=>request('password'),
        'phone'=>request('phone'),    
    ]);
     return redirect()->route('loginpage')->with('message','Registered sucessfully');
    }

    // function for employer dashboard

    public function dashboard()
    {
        return view('Employer.Emphome');
    }

    // function for employer org details

   public function ogdetials($id)
   {
    $org=Organization::find($id);
    $images=OrgImages::where('org_id',$id)->get();
    $reviews=Feedback::where('og_id',$id)->get();
    return  view('admin.Org_detials', compact('org','images','reviews'));
   }

   // function for employer profile

  public function profile()
  {
    $org=Auth::guard('Organization')->user();
    return view('Employer.Empprofile',compact('org'));

  }

  // function for employer update profile form

  public function updateform()
  {
    $org=Auth::guard('Organization')->user();
    return view('Employer.update_profile',compact('org'));
  }

  // function for employer update profile

  public function update(Request $update)
  {
    $update->validate([
      'name' => 'required',
      'email' => 'required|email',
      'pho' => 'required|max:10|min:10', 
      'add' => 'required',
      'city' => 'required',
      'state' => 'required',
      'website' => 'required',
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
      'website' => request('website'),
      'description' => request('about'),
   
    ]);

    if($org->iscomplete())
    {
      if($org->is_approved==='ideal')
      {
        $org->is_approved='waiting';
        $org->save();
      }
    }
    if($update->hasFile('images')){
      foreach($update->file('images') as $image){
          $path = $image->store('organization_images', 'public');

          OrgImages::create([
              'org_id' => $us->org_id,
              'image' => $path
          ]);
      }
  }
   
    return response()->json(['success' => ' Updated successfully']);
    // return view('Employer.Empprofile',compact('org'));
  }

  // function for employer job form
 
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

  // function for employer add job

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

  // function for employer edit existing job form

  public function jobedit($id)
  {
    $job=Job::findOrFail($id);
    return view('Employer.jobedit',compact('job'));
  }


  // function for employer edit existing job 

  public function jobeditupdate(Request $req)
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
    $job=Job::findOrFail($req->j_id);
    $job->update([
      'name'=>request('name'),
      'description'=>request('desc'),
      'skills'=>request('skill'),
      'Education'=>request('edu'),
      'city'=>request('city'),
      'salary'=>request('salary'),
      'category'=>request('category'),
      'type'=>request('type'),
      'due'=>request('due'),
    ]);
    return response()->json(['success' => 'Job updated successfully']);
  }


  // function for employer job list

  public function showjobs()
  {
    return view('Employer.jobs');
  }

  // function for employer job list data

  public function jobs()
  {
    $us=Auth::guard('Organization')->user();
    $jobs =Job::where('org_id',$us->org_id);
    return DataTables::of($jobs)
    ->addColumn('status', function ($row) {
      return \Carbon\Carbon::now()->greaterThan($row->due)
          ? '<span class="status closed">Closed</span>'
          : '<span class="status active">Active</span>';
  })
      ->addColumn('action',function($row){
        $btn='<a href="#" data-id="'.$row->j_id.'"  class="btn btn-sm btn-primary" id="viewbtn">Applications</a>';
        $btn2='<a href="#" data-id="'.$row->j_id.'"  class="btn btn-sm btn-warning ml-1" id="editbtn">Edit</a>';
        $btn3='<a href="#" data-id="'.$row->j_id.'"  class="btn btn-sm btn-danger ml-1" id="deletebtn">Delete</a>';
        return $btn.$btn2.$btn3;
      })
      ->rawColumns(['action','status'])
      ->make(true);
  }

  public function jobdelete($id)
  {
    $record = Job::findOrFail($id);
    $record->delete();
    return response()->json(['success' => 'Deleted successfully']);

  }
  // function for employer application page

  public function apppage()
  {
    return view('Employer.application');
  }

  // function for employer application list

  public function applist($id)
  {
    
      
    $applications=Application::where('job_id', $id)->with(['jobs', 'users']);
    return DataTables::eloquent($applications)
    ->addColumn('job_title', fn($app) => $app->jobs->name ?? 'N/A')
    ->addColumn('user_name', fn($app) => $app->users->name ?? 'N/A')
    ->addColumn('email', fn($app) => $app->users->email ?? 'N/A')
    ->addColumn('action', function ($app) {
      $button_text = ($app->status === "pending") ? 'Details' : 'Selected';
      $button_class = ($app->status === "pending") ? 'btn btn-sm btn-primary' : 'btn btn-sm btn-success';
      return '<a href="#" data-id="'.$app->u_id.'" data-job="'.$app->job_id.'" class="' . $button_class . '" id="applicants">'.$button_text.'</a>';
  })   
   ->filterColumn('user_name', function($query, $keyword) {
      $query->whereHas('users', function($q) use ($keyword) {
          $q->where('name', 'like', "%{$keyword}%");
      });
  })
    ->rawColumns(['action']) // allows HTML in action column
    ->toJson();
     
  }

  // function for employer view applicants

  public function view_applicants($id,$jobId)
  {
    $applicant=User::with(['education','experience'])->findOrFail($id);
    $appid=Application::where('u_id',$id)->where('job_id',$jobId)->first();
    $job=Job::where('j_id',$appid->job_id)->first();
    return view('Employer.applicants',compact('applicant','job','appid'));
  }




  // function for employer logout

    public function logout()
    {
        Auth::guard('Organization')->logout();
        return redirect()->route('master');
    }
   
    // function for employer job schedule email
    
    public function jobSchedule($m,$j,$a)
    {
      $mail=$m;
      $jobid=$j;
      $appid=$a;
      return view('Employer.accept-Email',compact('mail','jobid','appid'));
    }



}
