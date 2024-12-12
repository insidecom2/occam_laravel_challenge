<?php

namespace App\Repositories;

use App\Models\UserCode;

class UserCodeRepository
{
    public static function create($data)
    {
        return UserCode::create($data);
    }

    public static function getByUserId($userId)
    {
        return UserCode::where('user_id', $userId)->orderBy('created_at', 'desc')->first();
    }

    public static function delete($id)
    {
        return UserCode::where('id', $id)->delete();
    }

    public static function clearCodeByUserId($userId, $id)
    {
        if ($userId == null || $id == null) return false;

        return  UserCode::where('user_id', $userId)
            ->where('id', '!=', $id)
            ->delete();
    }
}
