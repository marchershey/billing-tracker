<?php

namespace App\Jobs\Setup;

use App\Events\SetupStarted;
use App\User;
use App\UserRate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateUserRates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SetupStarted $event)
    {
        (new UserRate)->generateRates($event->user);

        $event->user->setup_completed = 1;
        $event->user->save();
    }
}
