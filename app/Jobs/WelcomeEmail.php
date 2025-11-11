<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User; 

class WelcomeEmail implements ShouldQueue 
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public User $user;
    public function __construct(User $user)
    {
        $this->user = $user; // Assign the user object passed to the constructor
    }
    public function handle(): void
    {
        \Illuminate\Support\Facades\Log::info("Sending welcome email to: " . $this->user->email);
        sleep(5);
        \Illuminate\Support\Facades\Log::info("Welcome email sent to: " . $this->user->email);
    }
}