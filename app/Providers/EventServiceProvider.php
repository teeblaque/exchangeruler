<?php

namespace App\Providers;

use App\Events\LogEvent;
use App\Handlers\Events\AuthEventHandler;
use App\Listeners\LogListener;
use App\Logger;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
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
            SendEmailVerificationNotification::class,
        ],
        'App\Events\LogEvent' => [
            'App\Listeners\LogListener',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        // Event::subscribe('App\Handlers\Events\AuthEventHandler');
    }
}
