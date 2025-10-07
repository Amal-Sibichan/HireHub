<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Newcontroller;
use App\Http\Controllers\Mailcontroller;

use App\Http\Middleware\Isloggedin;
use App\Http\Controllers\Employer;
use App\Http\Middleware\Emplogin;

// User Routes
Route::middleware(Isloggedin::class)->group(function () {
    Route::get('edit', [Newcontroller::class, 'edit'])->name('edit.user');
    Route::post('update', [Newcontroller::class, 'update'])->name('user.update');
    Route::get('Profile', [Newcontroller::class, 'Userprofile'])->name('user.profile');
    Route::get('update/edu', [Newcontroller::class, 'updateEdu'])->name('update.edu');
    Route::get('update/Exp', [Newcontroller::class, 'updateExp'])->name('update.exp');
    Route::get('/logout', [Newcontroller::class, 'logout'])->name('logout');
    Route::post('eduupdate', [Newcontroller::class, 'storeEdu'])->name('store.edu');
    Route::post('expupdate', [Newcontroller::class, 'storeExp'])->name('store.exp');
// admin routes
    Route::get('admin/index',[Newcontroller::class,'admin_index'])->name('admin.index');
    Route::get('/admin', [Newcontroller::class, 'admin'])->name('admin');
    Route::get('/approvel/{id}', [Mailcontroller::class, 'Approve'])->name('org.approve');
    Route::post('/reject/{id}', [Mailcontroller::class, 'reject'])->name('org.reject');
    Route::get('/applay/{id}', [Newcontroller::class, 'job_application'])->name('u.applay');
    Route::get('/showusers', [Newcontroller::class, 'showusers'])->name('showusers');
    Route::get('/Users', [Newcontroller::class, 'Totalusers'])->name('Users');
    Route::get('/showorganization/{id}', [Newcontroller::class, 'showorganization'])->name('showorganization');
    Route::get('/Employers', [Newcontroller::class, 'Totalemployers'])->name('Employers');
    Route::get('/waitinglist', [Newcontroller::class, 'waitinglist'])->name('waitinglist');
    Route::post('/reviews', [Newcontroller::class, 'storeReview'])->name('reviews.store');
    Route::post('/addadmin', [Newcontroller::class, 'addadmin'])->name('addadmin');
    Route::get('/User_detials/{id}', [Newcontroller::class, 'User_detials'])->name('User_detials');

    
});
Route::get('/company/detials/{id}', [Newcontroller::class, 'company'])->name('company.detials');
Route::get('/job_details/{id}', [Newcontroller::class, 'job_details'])->name('job_details');
Route::get('/', [Newcontroller::class, 'master'])->name('master');
Route::get('User/index', [Newcontroller::class, 'Userindex'])->name('index');
Route::get('/contact', [Newcontroller::class, 'contact'])->name('contact');
Route::get('/single_blog', [Newcontroller::class, 'single_blog'])->name('single_blog');
Route::get('/elements', [Newcontroller::class, 'elements'])->name('elements');
Route::get('/about', [Newcontroller::class, 'about'])->name('about');
Route::get('/blog', [Newcontroller::class, 'blog'])->name('blog');
Route::get('/job_listing', [Newcontroller::class, 'job_listing'])->name('job_listing');
Route::get('/jobs', [Newcontroller::class, 'Findjobs'])->name('Find.Jobs');
Route::get('/registerpage', [Newcontroller::class, 'registerpage'])->name('registerpage');
Route::post('/register', [Newcontroller::class, 'newuser'])->name('u.register');
Route::get('/loginpage', [Newcontroller::class, 'loginpage'])->name('loginpage');
Route::post('/login', [Newcontroller::class, 'login'])->name('u.login');
// forget password routes
Route::post('/resetpassword', [Mailcontroller::class, 'sendotp'])->name('password.send_otp');
Route::post('/otpverify', [Mailcontroller::class, 'varifyotp'])->name('password.otp_varify');
Route::post('/newpassword', [Mailcontroller::class, 'resetpassword'])->name('password.reset');
Route::get('Orgdetials/{id}',[Employer::class,'ogdetials'])->name('Orgdetials');
#Employer routes
Route::middleware(Emplogin::class)->group(function () {
   
    Route::get('Elogout',[Employer::class,'logout'])->name('Emp.logout');
    Route::get('Edashboard',[Employer::class,'dashboard'])->name('Emp.dashboard');
    Route::get('EProfile',[Employer::class,'profile'])->name('Emp.profile');
    Route::post('profile/update',[Employer::class,'update'])->name('Emp.update');
    Route::get('profile/updateform',[Employer::class,'updateform'])->name('Emp.updateform');
    Route::post('addjob',[Employer::class,'Add'])->name('Emp.job.add');
    Route::get('jobform',[Employer::class,'jobform'])->name('Emp.jobform');
    Route::get('applications/{id}',[Employer::class,'applist'])->name('Emp.applist');
    Route::get('apppage',[Employer::class,'apppage'])->name('Emp.apppage');
    Route::get('Employer/index',[Employer::class,'index'])->name('Emp.index');
    Route::get('jobedit/{id}',[Employer::class,'jobedit'])->name('Emp.jobedit');
    Route::post('jobedit/update',[Employer::class,'jobeditupdate'])->name('Emp.jobedit.update');

    Route::get('recentjobs',[Employer::class,'showjobs'])->name('Emp.showjobs');
    Route::get('joblist',[Employer::class,'jobs'])->name('Emp.jobs');
    Route::get('jobapplications',[Employer::class,'application'])->name('Emp.applicants');
    Route::get('Applicants/{id}/{jobId}',[Employer::class,'view_applicants'])->name('Emp.applicant.detials');
    // accept email routes
    Route::get('jobSchedule/{id}/{jobId}/{appId}',[Employer::class,'jobSchedule'])->name('Emp.jobSchedule');
    Route::post('interviewSchedule/{appid}',[Mailcontroller::class,'Schedule'])->name('Emp.interviewSchedule');


  
});
Route::get('Eregister',[Employer::class,'Showregister'])->name('Emp.register');
Route::post('Eregister',[Employer::class,'save'])->name('Emp.save');
