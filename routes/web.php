<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

// ray('hello world');

Route::get('/', [\App\Http\Controllers\Welcome::class, 'welcome'])->name('welcome');
Route::get('/home', [\App\Http\Controllers\Welcome::class, 'welcome']);

// Show sign-in form
Route::get('/signin', [\App\Http\Controllers\SignInController::class, 'showSignInForm'])->name('login');

// Handle sign-in form submission
Route::post('/signin', [\App\Http\Controllers\SignInController::class, 'signIn'])->name('signin');

// Show sign-in form
Route::get('/signup', [\App\Http\Controllers\SignUpController::class, 'showSignInForm'])->name('signup.form');

// Handle sign-in form submission
Route::post('/signup', [\App\Http\Controllers\SignUpController::class, 'signUp'])->name('signup');

Route::get('/verify-success', function () {
    return view('auth.signup-success');
})->name('verify.success');

// Handle sign-out
Route::post('/signout', [\App\Http\Controllers\SignInController::class, 'signOut'])->name('signout');

//Handle explore recipes route
Route::get('/explore', [\App\Http\Controllers\ExploreController::class, 'index'])->middleware('auth')->name('explore.index');

// verify your email dude
Route::get('/email/verify', function () {
    return view('auth.signup-success');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    ray('pre-redirect', $request);

    $request->fulfill();

    ray('try-redirect');

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/forgot-password', [\App\Http\Controllers\ForgotPassword::class, 'index'])->name('password.request');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/forgot-password', [\App\Http\Controllers\ForgotPassword::class, 'recoverPassword'])->name('forgotpassword');

Route::post('/reset-password', [\App\Http\Controllers\ForgotPassword::class, 'resetPassword'])->middleware('guest')->name('password.update');

// recipes routes
Route::resource('recipes', \App\Http\Controllers\RecipesController::class)->middleware(['auth']);

Route::get('recipes/{recipe:slug}', [\App\Http\Controllers\RecipesController::class, 'show'])->middleware(['auth'])->name('recipes.show');
Route::get('recipes/{recipe:slug}/edit', [\App\Http\Controllers\RecipesController::class, 'edit'])->middleware(['auth'])->name('recipes.edit');
Route::put('recipes/{recipe:slug}', [\App\Http\Controllers\RecipesController::class, 'update'])->middleware(['auth'])->name('recipes.update');
Route::delete('recipes/{recipe:slug}', [\App\Http\Controllers\RecipesController::class, 'destroy'])->middleware(['auth'])->name('recipes.destroy');

// users
Route::get('/user/{user}', [\App\Http\Controllers\UserController::class, 'show'])->middleware(['auth'])->name('user.show');

Route::get('/user/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->middleware(['auth'])->name('user.edit');

Route::put('/user/{user}/edit', [\App\Http\Controllers\UserController::class, 'update'])->middleware(['auth'])->name('user.update');

// Search
Route::get('/search', [\App\Http\Controllers\SearchRecipeController::class, 'index'])->middleware(['auth'])->name('search.index');
