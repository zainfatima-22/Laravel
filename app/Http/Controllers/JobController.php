<?php

namespace App\Http\Controllers;

use App\Models\Job; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        // 1. Eager Loading Optimization & Selecting Only Needed Columns:
        // We select only the columns needed from the 'job_listings' table, 
        // and apply column selection on the eager-loaded 'employer' relationship.
        $jobs = Job::select('id', 'title', 'salary', 'employer_id', 'created_at')
            ->with(['employer' => function ($query) {
                // IMPORTANT: Always select the foreign key ('id' for the related model)
                $query->select('id', 'name', 'industry'); 
            }])
            ->latest()
            ->simplePaginate(5);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1 
        ]);

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs')->with('success', 'Job deleted successfully.');
    }

    public function edit(Job $job)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }
        
        $job->loadMissing('employer.user');
        if ($job->employer->user->isNot(Auth::user())) {
            abort(403, 'You do not own this job listing.');
        }

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
            'description' => request('description'),
            'location' => request('location'),
            'employment_type' => request('type'),
        ]);

        return redirect('/jobs/' . $job->id)->with('success', 'Job updated successfully.');
    }
}