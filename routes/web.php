<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/freelance', function () {
    return view('freelance');
});

Route::get('/jobs', function () {
    return view('jobs');
});

Route::get('/candidate', function () {
    return view('candidate');
});

Route::get('/job_details', function () {
    return view('job_details');
});

Route::get('/elments', function () {
    return view('job_details');
});

Route::get('/blog', function () {
    return view('blog');
});
Route::get('/single-blog', function () {
    return view('single-blog');
});

Route::get('/Login', function () {
    return view('Login');
});
