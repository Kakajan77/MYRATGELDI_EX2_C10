<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContractController;






Route::get('/', function () {
    return view('layouts');
});

Route::resource('freelancers',FreelancerController::class);
Route::resource('reviews',ReviewController::class);
Route::resource('jobs',JobController::class);
Route::resource('proposals',ProposalController::class);
Route::resource('contracts',ContractController::class);
Route::resource('users',UserController::class);






