<?php

namespace App\Jobs;

use App\Models\Group;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UpdateEtimGroups implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user = Auth::user();
    public $date = now();

        /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {

    }

    /**
     * Determine the time at which the job should timeout.
     */
    public function retryUntil(): DateTime
    {
        return now()->addMinutes(10);
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {


        Log::channel('activity')->info('UpdateEtimGroups started by user: '. $this->user->name);
        $groups = new Group;
        $groups->updateFromApi();
        Log::channel('activity')->info('UpdateEtimGroups started by user: ' . $this->user->name . ' - has finished');
    }
}
