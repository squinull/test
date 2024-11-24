<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ReleaseController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('feature', FeatureController::class);

Route::resource('release', ReleaseController::class);
