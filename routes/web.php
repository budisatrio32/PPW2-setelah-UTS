<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\ApplicationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/jobs', function () {
    return "HalamanAdminJobs";
})->middleware(['auth', 'isAdmin']);

Route::resource('jobs', JobController::class)->middleware(['auth', 'isAdmin']);

Route::get('/admin', function () {
    return "HaloAdmin!";
})->middleware(['auth', 'isAdmin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/kirim-email', [SendEmailController::class, 'index'])->name('kirim-email');
    Route::post('/kirim-email', [SendEmailController::class, 'store'])->name('post-email');
});

Route::post('/jobs/{job}/apply',
[ApplicationController::class,
'store'])->name('apply.store')->middleware('auth');
Route::get('/jobs/{job}/applicants',
[ApplicationController::class,
'index'])->name('job.applicants')->middleware('isAdmin');

Route::resource('jobs',
    JobController::class)->middleware(['auth',
    'isAdmin'])->except(['index', 'show']);

Route::resource('jobs',
    JobController::class)->middleware(['auth'])->only(['index',
    'show']);

Route::resource('applications',
ApplicationController::class)->middleware(['auth',
'isAdmin'])->except(['index', 'show']);

Route::resource('applications',
ApplicationController::class)->middleware(['auth'])->only(
['index', 'show']);

Route::get('/applications/export',
[ApplicationController::class,
'export'])->name('applications.export')->middleware('isAdmin');

Route::post('/jobs/import', [JobController::class, 'import'])->name('jobs.import')->middleware('isAdmin');
Route::get('/jobs/template/download', [JobController::class, 'downloadTemplate'])->name('jobs.template')->middleware('isAdmin');
Route::get('/jobs/template', [JobController::class, 'showTemplate'])->name('jobs.template.view')->middleware('isAdmin');


require __DIR__ . '/auth.php';