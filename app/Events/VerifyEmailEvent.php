<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class VerifyEmailEvent
{
    use SerializesModels;
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
}
