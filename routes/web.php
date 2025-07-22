<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Newcontroller;
Route::get('/index', [Newcontroller::class, 'index'])->name('index');
Route::get('/job_listing', [Newcontroller::class, 'job_listing'])->name('job_listing');
Route::get('/about', [Newcontroller::class, 'about'])->name('about');
Route::get('/blog', [Newcontroller::class, 'blog'])->name('blog');
Route::get('/single_blog', [Newcontroller::class, 'single_blog'])->name('single_blog');
Route::get('/elements', [Newcontroller::class, 'elements'])->name('elements');
Route::get('/job_details', [Newcontroller::class, 'job_details'])->name('job_details');
Route::get('/contact', [Newcontroller::class, 'contact'])->name('contact');
Route::get('/registerpage', [Newcontroller::class, 'registerpage'])->name('registerpage');
Route::post('/register', [Newcontroller::class, 'newuser'])->name('u.register');
Route::get('/', [Newcontroller::class, 'loginpage'])->name('loginpage');
Route::post('/login', [Newcontroller::class, 'login'])->name('u.login');
