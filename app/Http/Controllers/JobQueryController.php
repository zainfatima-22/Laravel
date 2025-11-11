<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class JobQueryController extends Controller
{
    public function index(Request $request)
    {
        $jobs = QueryBuilder::for(Job::class)
            ->allowedFilters(['title', 'location', 'employment_type']) 
            ->allowedSorts(['created_at', 'title']) 
            ->allowedIncludes(['employer', 'category']) 
            ->paginate();

        return response()->json($jobs);
    }
}
