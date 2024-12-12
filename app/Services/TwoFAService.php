<?php

namespace App\Services;

use App\Models\UserCode;
use App\Repositories\UserCodeRepository;
use App\Repositories\UserRepository;

class TwoFAService
{
    public static function storeCode(int $userId): string
    {
        $code = rand(100000, 999999);
        UserCodeRepository::create([
            'code' => $code,
            'user_id' => $userId
        ]);
        UserRepository::update($userId, [
            '2fa_expired_at' => null
        ]);
        return $code;
    }

    public static function verifyCode(int $userId, string $code): bool
    {
        $userCode = UserCodeRepository::getByUserId($userId);
        $expiredCode = strtotime("+" . env('2FA_CODE_EXPIRATION', 300) . " seconds", strtotime($userCode['created_at']));
        $dateTimeNow = strtotime('now');
        if (
            !$userCode || $userCode['code'] != $code ||
            $expiredCode < $dateTimeNow
        ) {
            return false;
        }

        // clear code in database without lasted id //
        UserCodeRepository::clearCodeByUserId($userId, $userCode['id']);

        $expiredTimeStamp = date("Y-m-d H:i:s", strtotime("+" . env('2FA_REMEMBER_EXPIRATION', 86400) . " seconds"));
        UserRepository::update($userId, [
            '2fa_expired_at' => $expiredTimeStamp
        ]);

        return true;
    }
}
