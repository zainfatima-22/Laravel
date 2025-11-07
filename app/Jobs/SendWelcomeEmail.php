<?php

namespace App\Jobs;

use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendWelcomeEmail implements ShouldQueue
{
    use Queueable;
    //public $timeout = 1;
    //public $tries = 10;
    //public $maxExceptions = 2;
    //public $backoff = [3,10,20];

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        sleep(1); 
        Log::info('Welcome Email Job completed successfully.'); 
    }
    
    public function failed($e)
    {
        Log::error('Welcome Email Job failed due to an unrecoverable error.', ['exception' => $e->getMessage()]);
    }
}
