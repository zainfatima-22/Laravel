<?php 

namespace App\Jobs;

use App\Models\Job; 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels; 

class FinalizeJobListing implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Job $jobListing; 

    public function __construct(Job $job)
    {
        $this->jobListing = $job; 
    }

    public function uniqueId(): string
    {
        return 'finalize_job_' . $this->jobListing->id; 
    }

    public function handle(): void
    {
        $job = $this->jobListing->fresh(); 

        if ($job->status !== 'published') {
            $job->update(['status' => 'published', 'published_at' => now()]);
        }
    }
}