<?php

namespace App\Jobs\Setup;

use App\Events\SetupStarted;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class GenerateUserSettings implements ShouldQueue
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
        DB::table('user_settings')->insert([
            [
                'user_id' => $event->user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
