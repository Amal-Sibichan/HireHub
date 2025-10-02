<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Skills;
use App\Models\Academics;
use App\Models\Application;
use App\Models\Experience;
use App\Models\Organization;
use App\Models\Job;
use App\Models\Feedback;
use Yajra\DataTables\Facades\DataTables;

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

    #.........................................Index.....................................#

    public function master()
    {
      return view('masteruser');
    }

   public function Userindex()
   {
      $user = Auth::user();
     $jobs= Job::with('Organization')->latest()->take(5)->get();
      $org=Organization::latest()->take(5)->get();
      $emp = Auth::guard('Organization')->user();
      if ($user) {
        if ($user->Role == 'Admin') {
            return redirect()->route('admin');
         }
         else
         {
            return view('index',compact('jobs','org'));
         }
      }
      elseif ($emp)
      {
         return redirect()->route('Emp.dashboard');
      }
      else
      {
         return view('index',compact('jobs','org'));
      }

   }
    #.........................................Admin dashboard.....................................#

   public function admin()
   {
      $waitingorg = Organization::where('is_approved','waiting')->count();
      return view('admin.admindashboard',compact('waitingorg'));
   }

   public function admin_index()
   {
    // Fetch latest N from each table
    $useractivity = User::select('user_id', 'name', 'created_at')
        ->latest()->take(10)->get()
        ->map(function ($item) {
            return [
                'type' => 'user',
                'title' => 'New User Registered: ' . $item->name,
                'time' => $item->created_at,
            ];
        });

    $jobactivity = Job::select('j_id', 'name', 'created_at')
        ->latest()->take(10)->get()
        ->map(function ($item) {
            return [
                'type' => 'job',
                'title' => 'Job Posted: ' . $item->name,
                'time' => $item->created_at,
            ];
        });

    $orgactivity = Organization::select('org_id', 'name', 'created_at')
        ->latest()->take(10)->get()
        ->map(function ($item) {
            return [
                'type' => 'organization',
                'title' => 'Organization Created: ' . $item->name,
                'time' => $item->created_at,
            ];
        });

    // Merge all collections and sort by time descending
    $activities = collect()
        ->merge($useractivity)
        ->merge($jobactivity)
        ->merge($orgactivity)
        ->sortByDesc('time')
        ->take(5)
        ->values();

    $user = User::take(5)->get();
    $usercount = User::count();
    $orgcount = Organization::count();
    $jobcount = Job::count();
    $admincount = User::where('Role','Admin')->count();
    $waitingorg = Organization::where('is_approved','waiting')->count();
    $org = Organization::all();
    return view('admin.Adminindex', compact('user', 'org','usercount','orgcount','waitingorg','activities','jobcount','admincount'));
   }
 #.........................................Add admin.....................................#

 public function addadmin(Request $request)
 {
  $request->validate([
    'name'=>'required',
    'email'=>'required|email|unique:users,email',
    'pass'=>['required',Password::min(8)
    ->mixedCase()
    ->letters()
    ->numbers()
    ->symbols()
    ->uncompromised()
   ],

  ]);

  User::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>$request->pass,
    'Role'=>'Admin',    
]);
return response()->json(['success' => ' Updated successfully']);
}




 #.........................................User_list.....................................#
   public function showusers()
   {
    return view('admin.Userlist');
   }


   public function Totalusers()
   {
    $users = User::all();
    return DataTables::of($users)
    ->addColumn('action',function($row){
      $btn='<a href="#" data-id="'.$row->user_id.'"  class="btn btn-sm btn-primary" id="viewbtn">View</a>';
      return $btn;
    })
    ->rawColumns(['action'])
    ->make(true);
   }
 #.........................................Organization_list.....................................#

   public function showorganization($id)
   {
    if($id == 1)
    {
        return view('admin.waitinglist'); 
    }   
    else
    {
        return view('admin.Employerlist');
    }
   }


   public function User_detials($id)
   {
    $applications = Application::with(['jobs', 'organizations'])
    ->where('u_id', $id) // current user
    ->latest()
    ->take(5)
    ->get();

    
    $user = User::with('Application','feedback')->findOrFail($id);
    $appcount=Application::where('u_id',$id)->count();
    return view('admin.User_detials', compact('user','appcount','applications'));
   }

   public function Totalemployers()
   {
    $organizations = Organization::all();
    return DataTables::of($organizations)
    ->addColumn('action',function($row){
      $btn='<a href="#" data-id="'.$row->org_id.'"  class="btn btn-sm btn-primary" id="viewbtn">View</a>';
      return $btn;
    })
    ->rawColumns(['action'])
    ->make(true);
   }


   #.........................................Waiting_list.....................................#
   public function waitinglist()
   {
    $organizations = Organization::where('is_approved','waiting')->get();
    return DataTables::of($organizations)
    ->addColumn('action',function($row){
      $btn='<a href="#" data-id="'.$row->org_id.'"  class="btn btn-sm btn-primary" id="viewbtn">View i</a>';
      return $btn;
    })
    ->rawColumns(['action'])
    ->make(true);
   }

    #.........................................Job_listing.....................................#

   public function job_listing(Request $request)
   {
   // Build the query with optional filters
   $query = Job::with('Organization');

   // Text search across job name, organization name, and city
   if ($search = $request->input('search')) {
     $query->where(function ($q) use ($search) {
       $q->where('name', 'like', "%{$search}%")
         ->orWhere('city', 'like', "%{$search}%")
         ->orWhere('category', 'like', "%{$search}%")
         ->orWhere('type', 'like', "%{$search}%")
         ->orWhereHas('Organization', function ($oq) use ($search) {
           $oq->where('name', 'like', "%{$search}%");
         });
     });
   }

   // Category filter
   if ($category = $request->input('category')) {
     $query->where('category', $category);
   }

   // Job type filter
   if ($jobType = $request->input('job_type')) {
     $query->where('type', $jobType);
   }

   // Location filter (by city)
   if ($location = $request->input('location')) {
     $query->where('city', $location);
   }

   // Paginate and keep query string for pagination links
   $jobs = $query->paginate(10)->appends($request->query());
   $totalJobs = $jobs->total();

   if ($request->ajax()) {
     return view('job_listing', compact('jobs','totalJobs'))->render();
   }
   return view('job_listing', compact('jobs','totalJobs'));
   }

   public function Findjobs()
   {
    $jobs = Job::all();
    return DataTables::of($jobs)
    ->addColumn('action',function($row){
      $btn='<a href="#" data-id="'.$row->j_id.'"  class="btn btn-sm btn-primary" id="viewbtn">View</a>';
      return $btn;
    })
    ->rawColumns(['action'])
    ->make(true);
   }

    #.........................................About_us.....................................#

   public function about()
   {
    return view('about');
   }

    #.........................................***.....................................#




    #.........................................Job_Detials.....................................#

   public function job_details($id)
   {
    $jobs= Job::with('Organization')->findOrFail($id);
    $user_id=Auth::user()->user_id ?? 0;
    $app= Application::where('u_id',$user_id)->where('job_id',$jobs->j_id)->value('u_id');
    $skills=preg_split('/\r\n|\r|\n/',$jobs->skills);
    $exp=preg_split('/\r\n|\r|\n/',$jobs->Education);
    return view('job_details', compact('jobs','skills','exp','app'));
   }



   public function job_application($id)
   {
    $job= Job::with('Organization')->findOrFail($id);
    $user=Auth::user();
    Application::create([
       'u_id' => $user->user_id,
       'job_id' => $job->j_id,
       'or_id' => $job->org_id,
        ]);
    return back();
   }



   public function contact()
   {
    return view('contact');
   }

     #.........................................Show-register page.....................................#

   public function registerpage()
   {
      return view('login', ['registerView' => true]);
   }

    #.........................................Create User.....................................#

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
     session()->flash('message', 'Registeration sucessfull you can login now');
      return redirect()->route('loginpage');
   }

#......................................Show Login........................................#

   public function loginpage()
   {
    return view('login');
   }

#......................................User Login........................................#

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
       if ($user->Role == 'Admin') {
        return redirect()->route('admin');
       }
       else
       {
        return redirect()->route('master')->with('message','Login sucessfully');
       }
    //   return view('index', compact('user'));
     }
     else if(Auth::guard('Organization')->attempt(['email' => $mail, 'password' => $pass])) 
     {
        return redirect()->route('Emp.dashboard');
    }
     else
     {
      return back()->withErrors([
        'Pass'=>"invalid credentials",
      ]);
     }
   }

    #................................User Logout..............................................#

   public function logout()
   {
    Auth::logout();
    return redirect()->route('master')->with('message','Logout sucessfully');
   }


 #.....................................Show Edit User.........................................#

   public function edit()
   {
       $uid = Auth::user()->user_id;
       // Eager load the skills relationship to avoid null errors
       $user = User::with('skills')->findOrFail($uid);
       $allSkills = Skills::all();
       
       return view('edit', compact('user', 'allSkills'));
   }

#......................................Show User profile........................................#


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
   

    #..........................................Update User ....................................#
                                            

   public function update(Request $update)
   {
       $uid = Auth::user()->user_id;
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
       
            return response()->json(['success' => ' Updated successfully']);
        }

    #................................. Show Update  Education page.............................................#

   public function updateEdu()
   {   

       $uid = Auth::user()->user_id;
       // Eager load the skills relationship to avoid null errors
       $user = User::with('skills')->findOrFail($uid);
       $allSkills = Skills::all();
       
       return view('userEducation', compact('user', 'allSkills'));
   }

#................................. Update  Education .............................................#

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
    return response()->json(['success' => ' Updated successfully']);
    // return redirect()->route('user.profile')->with('message','Updated sucessfully');

   }


       #..................................... show Update  Experience page.............................................#

   public function updateExp()
   {   

       $uid = Auth::user()->user_id;
       // Eager load the skills relationship to avoid null errors
       $user = User::with('skills')->findOrFail($uid);
       $allSkills = Skills::all();
       
       return view('userExperience', compact('user', 'allSkills'));
   }
 #.....................................Update  Education ...............................................#

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
    return response()->json(['success' => ' Updated successfully']);
    // return redirect()->route('user.profile')->with('message','Updated sucessfully');
}

#................................. user Reviews.............................................#

public function company($id)
{
  $org=Organization::with('images')->findOrFail($id);
  $reviews=Feedback::with('user')->where('og_id',$id)->get();
  return view('Companydetials',compact('org','reviews'));
}

public function storeReview(Request $review)
{
    $uid = Auth::user()->user_id;
    $review->validate([
        'review'=>'required',
        'rating'=>'required',
    ]);
    Feedback::create([
        'usr_id' => $uid,
        'og_id' => request('company_id'),
        'review' => request('review'),
        'rating' => request('rating'),
    ]);
    return response()->json(['success' => ' Review added successfully']);
} 

}
