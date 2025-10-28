<?php

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function(){
    $job = Job::with('employer')->simplePaginate(4);
    return view('jobs', [
        'jobs' => $job
    ]);
});

Route::get('/jobs/{id}', function ($id){
    $job = Job::find($id);
    /* Arr::first($jobs, function($job) use($id) {
        $d = $job['id'] == $id;
        dd($d);
    }); */
    return view('job', ['job' => $job]);
});

Route::get('/contact', function(){
    return view('contact');
});
