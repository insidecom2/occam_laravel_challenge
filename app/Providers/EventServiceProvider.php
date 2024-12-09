<?php

namespace App\Providers;

use App\Events\RegisteredEvent;
use App\Events\VerifyEmailEvent;
use App\Listeners\AuthSendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        RegisteredEvent::class => [
            AuthSendEmailVerificationNotification::class,
        ],
        VerifyEmailEvent::class => [
            AuthSendEmailVerificationNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
