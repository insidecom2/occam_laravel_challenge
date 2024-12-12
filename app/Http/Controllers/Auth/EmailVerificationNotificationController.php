<?php

namespace App\Http\Controllers\Auth;

use App\Events\VerifyEmailEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }

        try {
            event(new VerifyEmailEvent($request->user()));
            return back()->with('success', 'A new verification link has been sent to the email address you provided during registration.');
        } catch (\Throwable $th) {
            return back()->with('success', "Can't send email. Please try again.");
        }
    }
}
