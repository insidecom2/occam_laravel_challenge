<?php

namespace App\Http\Controllers\Auth;

use App\Events\VerifyTwoFAEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\TwoFAVerifyRequest;
use App\Repositories\UserCodeRepository;
use App\Services\TwoFAService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TwoFAAuthenticatedController extends Controller
{
    /**
     * Display the login view.
     */
    public function index(): View
    {
        $user = Auth::user();
        $userId = $user['id'];
        $userCode = UserCodeRepository::getByUserId($userId);
        $code = null;
        if ($userCode) {
            $expiredCode = strtotime("+" . env('2FA_CODE_EXPIRATION', 300) . " seconds", strtotime($userCode['created_at']));
            $dateTimeNow = strtotime('now');
            if ($expiredCode < $dateTimeNow) {
                $code = TwoFAService::storeCode($userId);
            }
        } else {
            $code = TwoFAService::storeCode($userId);
        }

        if ($code != null) {
            $user['code'] = $code;
            event(new VerifyTwoFAEvent($user));
        }

        $email = $user['email'];
        return view('auth.verify-two-fa', compact('email'));
    }

    public function resendCode(): RedirectResponse
    {
        $user = Auth::user();
        $userId = $user['id'];
        $code = TwoFAService::storeCode($userId);

        $user['code'] = $code;
        event(new VerifyTwoFAEvent($user));
        return back()->with('success', "We've sent a verification code to your email.");
    }

    /**
     * Handle an incoming authentication request.
     */
    public function verify(TwoFAVerifyRequest $request): RedirectResponse
    {
        $isVerify = TwoFAService::verifyCode(Auth::user()->id, $request->code);
        if (!$isVerify) {
            return redirect()->route('verify-2fa.index')->with('error', 'Invalid code or code has expired.');
        }

        return redirect()->route('dashboard');
    }
}
