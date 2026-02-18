<?php

use App\Http\Controllers\JobController;
use App\Models\JobPost;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;


// Route::get('/', function () {
//     return view('pages.home');
// })->name('home');

Route::get('/about-us', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact-us', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact-us',[JobController::class,'contact'])->name('contact.store');

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
Route::get('/sitemap.xml', function () {
    $jobs = JobPost::where('status', 'published')->get();

    $sitemap = Sitemap::create();

    $sitemap->add(Url::create('/'));
    $sitemap->add(Url::create('/about-us'));
    $sitemap->add(Url::create('/contact-us'));
    $sitemap->add(Url::create('/privacy-policy'));
    $sitemap->add(Url::create('/terms-and-conditions'));

    foreach ($jobs as $job) {
        $sitemap->add(
            Url::create("/{$job->slug}")
        );
    }

    return $sitemap->toResponse(request());
});
Route::get('/{slug}',[JobController::class,'find_by_slug'])->name('post_link');

