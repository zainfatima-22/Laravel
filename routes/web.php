<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\JobQueryController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Doctrine\DBAL\Portability\Middleware;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;


/* Orion::resource('jobs', JobController::class); */


/* Route::get('test', function (){
    dispatch(function(){
        logger("Hello from the queue!");
    });
    return 'done';
}); */

//Route::view('/', "welcome");
/* Route::get('/', function(){
    $chain = [
        \App\Jobs\PullRepo(),
        \App\Jobs\PullJob(),
        \App\Jobs\RunTests(),
        \App\Jobs\Deploy()
    ];
    Bus::chain($chain)->dispatch();
    $batch = [
        new \App\Jobs\PullRepo(),
        new \App\Jobs\PullJob(),
        new \App\Jobs\RunTests(),
        new \App\Jobs\Deploy()
    ];
    Bus::batch($batch)
    ->allowFailures()
    ->catch(function($batch, $e){
        //
    })
    ->then(function ($batch) {
        //
    })
    ->finally(function($batch) {
        //
    })
    ->onQueue('deployments')
    ->onConnection('database')
    ->dispatch();
    
    \App\jobs\SendWelcomeEmail::dispatch();
    return view('welcome');
}); */
Route::get("/", function () {
    \App\jobs\SendWelcomeEmail::dispatch();
    return view("welcome");
});
Route::view('/contact', "contact");
Route::view('/about', "about");
Route::controller(JobController::class)->group(function(){
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create')->middleware('auth');
    Route::post('/jobs','store');
    Route::get('/jobs/{job}', 'show');
    Route::delete('/jobs/{job}', 'destroy');
    Route::patch('/jobs/{job}', 'edit')->middleware('auth');
});  
Route::get('/user', [UserController::class, 'index']);
/* Route::resource('jobs', JobController::class); */
Route::get('/jobs-query', [JobQueryController::class, 'index']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::delete('/logout', [LoginController::class, 'destroy']);
Route::get('/test', [JobController::class, 'dispatchTest']);

Route::get('/admin', function () {
    return 'Welcome, Admin!';
})->middleware('role:admin');


Route::get('/create-job', function () {
    return 'You can create tickets!';
})->middleware('permission:create ticket');

Route::post('/jobs/create', [JobController::class, 'store'])
    ->middleware('permission:create ticket');
