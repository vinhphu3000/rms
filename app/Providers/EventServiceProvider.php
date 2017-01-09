<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ResourceRequest' => [
            'App\Listeners\SendRequestNotification@resourceRequest',
            'App\Listeners\ActivityLog@resourceRequest',
        ],
        'App\Events\CreateProject' => [
            'App\Listeners\ActivityLog@createProject',
        ],
        'App\Events\ResourceBooking' => [
            'App\Listeners\SendRequestNotification@createBooking',
            'App\Listeners\ActivityLog@createBooking',
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
