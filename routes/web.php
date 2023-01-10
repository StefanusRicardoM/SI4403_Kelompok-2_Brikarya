<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\Job;
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
    $jobs = Job::limit(5)->get();
    $tipe_pekerjaan = Job::select('tipe_pekerjaan')->distinct()->get();
    $lokasi = Job::select('lokasi')->distinct()->get();
    $count = count($jobs);
    return view('welcome', ['jobs' => $jobs, 'tipe_pekerjaan' => $tipe_pekerjaan, 'lokasi' => $lokasi, 'count' => $count]);
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/candidate', function () {
    return view('candidate');
});


Route::get('/elments', function () {
    return view('job_details');
});



Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/single-blog/{id}', [BlogController::class, 'show'])->name('blog.detail');
Route::post('/single-blog/{id}', [BlogController::class, 'commentStore'])->name('blog.comment');

Route::post('/user', [UserController::class, 'store'])->name("user.store");
Route::put('/user/{id}', [UserController::class, 'update'])->name("user.update");
Route::get('/login', [UserController::class, 'login'])->name("user.login");
Route::post('/login', [UserController::class, 'loginProcess'])->name("user.loginProcess");
Route::get('/logout', [UserController::class, 'logout'])->name("user.logout");
Route::get('/register', [UserController::class, 'register'])->name("user.register");

Route::get('/jobs', [JobController::class, 'index'])->name('job');
Route::get('/job_detail/{id}', [JobController::class, 'show'])->name('job_details');

Route::get('/freelance', [JobController::class, 'freelance'])->name('freelance');

Route::post('/applyjob', [ApplyController::class, 'store'])->name('apply.store');
Route::put('/applyjob/{id}/{status}', [ApplyController::class, 'applyDecision'])->name('apply.applyDecision');

Route::redirect('/dashboard', '/dashboard/profile');

Route::get('/dashboard/profile', [UserController::class, 'profile'])->middleware('auth')->name("dashboard.profile");
Route::get('/dashboard/job', [JobController::class, 'yourJob'])->middleware('auth')->name("dashboard.job");
Route::get('/dashboard/freelance', [JobController::class, 'yourFreelance'])->middleware('auth')->name("dashboard.freelance");

Route::get('/dashboard/postjob', [JobController::class, 'job'])->middleware('auth')->name("dashboard.postjob");
Route::post('/dashboard/postjob', [JobController::class, 'store'])->middleware('auth')->name("job.store");
Route::get('/dashboard/postjob/edit/{id}', [JobController::class, 'edit'])->middleware('auth')->name("job.edit");
Route::put('/dashboard/postjob/edit/{id}', [JobController::class, 'update'])->middleware('auth')->name("job.update");
Route::get('/dashboard/postjob/delete/{id}', [JobController::class, 'destroy'])->middleware('auth')->name("job.destroy");

Route::get('/dashboard/postblog', [BlogController::class, 'blog'])->middleware('auth')->name("dashboard.postblog");
Route::post('/dashboard/postblog', [BlogController::class, 'store'])->middleware('auth')->name("blog.store");
Route::get('/dashboard/postblog/{id}', [BlogController::class, 'edit'])->middleware('auth')->name("blog.edit");
Route::put('/dashboard/postblog/{id}', [BlogController::class, 'update'])->middleware('auth')->name("blog.update");
Route::get('/dashboard/postblog/delete/{id}', [BlogController::class, 'destroy'])->middleware('auth')->name("blog.destroy");

Route::get('/dashboard/jobsubmission', [JobController::class, 'jobSubmit'])->middleware('auth')->name("dashboard.jobsubmit");
Route::get('/dashboard/freelancesubmission', [JobController::class, 'freelanceSubmit'])->middleware('auth')->name("dashboard.freelancesubmit");
