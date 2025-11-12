<?php

namespace App\Http\Controllers;

use App\Models\Job; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\FinalizeJobListing;

class JobController extends Controller
{
    /* protected $model = Job::class;
    protected $authorization = false;
    protected $policy = null;
    public function authorize($ability, $arguments = [])
    {
        return true; 
    } */

    public function index()
    {
        $jobs = Job::select('id', 'title', 'salary', 'employer_id', 'created_at')
            ->with(['employer' => function ($query) {
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
    public function dispatchTest()
    {
        $pendingJob = Job::create([
            'title' => 'Test Job for Unique Queue',
            'salary' => '90000',
            'employer_id' => 1,
            'status' => 'pending' 
        ]);

        $jobId = $pendingJob->id;
        FinalizeJobListing::dispatch($pendingJob);
        FinalizeJobListing::dispatch($pendingJob);
        FinalizeJobListing::dispatch($pendingJob);

        return response("Dispatched 3 identical unique jobs for Job ID: {$jobId}. Check your queue worker logs.", 200);
    }  
}
