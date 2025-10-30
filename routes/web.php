<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/* Route::get('test', function (){
    dispatch(function(){
        logger("Hello from the queue!");
    });
    return 'done';
}); */

// 
Route::view('/', "welcome");
Route::view('/contact', "contact");
Route::view('/about', "about");
Route::controller(JobController::class)->group(function(){
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create')->middleware('auth');
    Route::post('/jobs','store');
    Route::get('/jobs/{job}', 'show');
    Route::delete('/jobs/{job}', 'destro');
    Route::patch('/jobs/{job}', 'edit')->middleware('auth');
}); 

/* Route::resource('jobs', JobController::class); */

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::delete('/logout', [LoginController::class, 'destroy']);