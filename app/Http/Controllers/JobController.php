<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $job = Job::with('employer')->latest()->simplePaginate(5);
        return view('jobs.index', [
        'jobs' => $job
    ]);
    }
    public function create(){
        return view('jobs.create');
    }
    public function store(){
            request() -> validate([
            'title' => ['required',"min:3"],
            'salary' => ['required']
        ]);
        Job::create([
            'Title' => request('title'),
            'Salary' => request('salary'),
            'employer_id'=> 1
        ]);
        return redirect('/jobs');
    }
    public function show(Job $job){
        return view('jobs.show', ['job' => $job]);
    }
    public function destroy(Job $job){
        $job->delete();
        return redirect('/jobs')->with('success', 'Job deleted successfully.');

    }
    public function edit(Job $job){
            request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job->update([
            'Title' => request('title'),
            'Salary' => request('salary'),
            'description' => request('description'),
            'location' => request('location'),
            'employment_type' => request('type'),
        ]);

        return redirect('/jobs/' . $job->id)->with('success', 'Job updated successfully.');
        }
}
