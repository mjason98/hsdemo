<?php

use Illuminate\Support\Facades\Route;

// ray('hello world');

Route::get('/', [\App\Http\Controllers\Welcome::class, 'welcome']);
