<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomVerifyTwoFAEmail extends Notification implements ShouldQueue
{
    use Queueable;

    private $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Verify your identity.')
            ->greeting('Help us protect your account')
            ->line('Before you sign in, we need to verify your identity. Enter the following code on the sign-in page.')
            ->line('Code ' . $this->code);
    }
}
