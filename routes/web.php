<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', "welcome");
Route::view('/contact', "contact");
Route::view('/about', "about");
/* Route::controller(JobController::class)->group(function(){
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::post('/jobs','store');
    Route::get('/jobs/{job}', 'show');
    Route::delete('/jobs/{job}', 'destro');
    Route::patch('/jobs/{job}', 'edit');
}); */

Route::resource('jobs', JobController::class);