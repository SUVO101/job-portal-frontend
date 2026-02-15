<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('pages.home');
// })->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/job', function () {
    return view('pages.jobDetails');
})->name('job');

Route::get('/jobs', function () {
    return view('pages.allJobs');
})->name('jobs');

// Route::get('/allJobs',[JobController::class,'index'])->name('allJobs');
Route::get('/',[JobController::class,'index'])->name('home');
Route::get('/test',[JobController::class,'test'])->name('test');

Route::get('/job/{type}/{slug}',[JobController::class,'find_by_type'])->name('link');
Route::get('/{slug}',[JobController::class,'find_by_slug'])->name('post_link');