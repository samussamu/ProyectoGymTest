<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;


use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\NewUserHasRegisteredEvent;
use App\Listeners\WelcomeNewUserListener;
use App\Listeners\NotifyAdminViaEmailListener;

use App\Events\SendStatsEvent;
use App\Listeners\SendStatsListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class EventServiceProvider extends ServiceProvider
{
  
    protected $listen = [
        NewUserHasRegisteredEvent::class=> [
            WelcomeNewUserListener::class,
            NotifyAdminViaEmailListener::class,
        ],
        SendStatsEvent::class=>[
            SendStatsListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
