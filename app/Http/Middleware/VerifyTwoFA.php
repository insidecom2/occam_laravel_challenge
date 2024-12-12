<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyTwoFA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $expiredTimeStamp = date("Y-m-d H:i:s", strtotime("+" . env('2FA_REMEMBER_EXPIRATION', 86400) . " seconds"));
        if ($user['is_email_2fa'] && ($user['2fa_expired_at'] > $expiredTimeStamp || $user['2fa_expired_at'] == null)) {
            return redirect()->route('verify-2fa.index');
        }
        return $next($request);
    }
}
