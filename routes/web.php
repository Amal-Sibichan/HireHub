<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Newcontroller;
use App\Http\Middleware\Isloggedin;
use App\Http\Controllers\Employer;
Route::middleware(Isloggedin::class)->group(function () {
    Route::get('edit', [Newcontroller::class, 'edit'])->name('edit.user');
    Route::post('update', [Newcontroller::class, 'update'])->name('user.update');
    Route::get('Profile', [Newcontroller::class, 'Userprofile'])->name('user.profile');
    Route::get('update/edu', [Newcontroller::class, 'updateEdu'])->name('update.edu');
    Route::get('update/Exp', [Newcontroller::class, 'updateExp'])->name('update.exp');
    Route::get('/logout', [Newcontroller::class, 'logout'])->name('logout');
    Route::post('eduupdate', [Newcontroller::class, 'storeEdu'])->name('store.edu');
    Route::post('expupdate', [Newcontroller::class, 'storeExp'])->name('store.exp');
    Route::get('/admin', [Newcontroller::class, 'admin'])->name('admin');

});

Route::get('/', [Newcontroller::class, 'index'])->name('index');
Route::get('/job_details', [Newcontroller::class, 'job_details'])->name('job_details');
Route::get('/contact', [Newcontroller::class, 'contact'])->name('contact');
Route::get('/single_blog', [Newcontroller::class, 'single_blog'])->name('single_blog');
Route::get('/elements', [Newcontroller::class, 'elements'])->name('elements');
Route::get('/about', [Newcontroller::class, 'about'])->name('about');
Route::get('/blog', [Newcontroller::class, 'blog'])->name('blog');
Route::get('/job_listing', [Newcontroller::class, 'job_listing'])->name('job_listing');
Route::get('/registerpage', [Newcontroller::class, 'registerpage'])->name('registerpage');
Route::post('/register', [Newcontroller::class, 'newuser'])->name('u.register');
Route::get('/loginpage', [Newcontroller::class, 'loginpage'])->name('loginpage');
Route::post('/login', [Newcontroller::class, 'login'])->name('u.login');

#Employer routes


Route::get('Eregister',[Employer::class,'Showregister'])->name('Emp.register');
Route::post('Eregister',[Employer::class,'save'])->name('Emp.save');
Route::get('Elogout',[Employer::class,'logout'])->name('Emp.logout');
Route::get('Edashboard',[Employer::class,'dashboard'])->name('Emp.dashboard');


