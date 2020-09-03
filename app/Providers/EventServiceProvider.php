<?php

namespace App\Providers;

use App\Events\SetupStarted;
use App\Jobs\Setup\GenerateUserRates;
use App\Jobs\Setup\GenerateUserSettings;
use App\Listeners\SendEmailVerificationEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationEmail::class,
        ],
        Verified::class => [
            //
        ],
        SetupStarted::class => [
            GenerateUserSettings::class,
            GenerateUserRates::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
