<?php

use Illuminate\Support\Facades\Route;

// ray('hello world');

Route::get('/', [\App\Http\Controllers\Welcome::class, 'welcome']);

// Show sign-in form
Route::get('/signin', [\App\Http\Controllers\SignInController::class, 'showSignInForm'])->name('signin.form');

// Handle sign-in form submission
Route::post('/signin', [\App\Http\Controllers\SignInController::class, 'signIn'])->name('signin');

// Handle sign-out
Route::post('/signout', [\App\Http\Controllers\SignInController::class, 'signOut'])->name('signout');

//Handle explore recepies route
Route::get('/explore', [\App\Http\Controllers\ExploreController::class, 'index'])->name('explore.index');
