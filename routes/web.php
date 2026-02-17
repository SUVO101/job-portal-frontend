<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('pages.home');
// })->name('home');

Route::get('/about-us', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact-us', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/privacy-policy', function () {
    return view('pages.privacy_policy');
})->name('privacy-policy');

Route::get('/terms-and-conditions', function () {
    return view('pages.terms_and_conditions');
})->name('terms-and-conditions');

// Route::get('/job', function () {
//     return view('pages.jobDetails');
// })->name('job');

// Route::get('/jobs', function () {
//     return view('pages.allJobs');
// })->name('jobs');

// Route::get('/allJobs',[JobController::class,'index'])->name('allJobs');
Route::get('/',[JobController::class,'index'])->name('home');
// Route::get('/test',[JobController::class,'test'])->name('test');

Route::get('/job/{type}/{slug}',[JobController::class,'find_by_type'])->name('link');
Route::get('/search',[JobController::class,'search'])->name('search');
Route::get('/{slug}',[JobController::class,'find_by_slug'])->name('post_link');