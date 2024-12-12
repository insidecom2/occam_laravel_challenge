<?php

namespace App\Listeners;

use App\Notifications\CustomVerifyTwoFAEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AuthSendEmailTwoFANotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;
        $code = $user['code'];
        $user->notify(new CustomVerifyTwoFAEmail($code));
    }
}
