<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// ray('hello world');

Route::get('/', [\App\Http\Controllers\Welcome::class, 'welcome'])->name('welcome');

// Show sign-in form
Route::get('/signin', [\App\Http\Controllers\SignInController::class, 'showSignInForm'])->name('login');

// Handle sign-in form submission
Route::post('/signin', [\App\Http\Controllers\SignInController::class, 'signIn'])->name('signin');

// Show sign-in form
Route::get('/signup', [\App\Http\Controllers\SignUpController::class, 'showSignInForm'])->name('signup.form');

// Handle sign-in form submission
Route::post('/signup', [\App\Http\Controllers\SignUpController::class, 'signUp'])->name('signup');

Route::get('/signup/success', function () {
    return view('signup-success');
})->name('signup.success');

// Handle sign-out
Route::post('/signout', [\App\Http\Controllers\SignInController::class, 'signOut'])->name('signout');

//Handle explore recepies route
Route::get('/explore', [\App\Http\Controllers\ExploreController::class, 'index'])->name('explore.index');

// verify your email dude
Route::get('/email/verify', function () {
    return view('signup-success');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    ray('try-redirect');
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');