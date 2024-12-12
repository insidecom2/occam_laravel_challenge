<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public static function create($data)
    {
        return User::create($data);
    }
    public static function getAll()
    {
        return User::where('is_active', 1)->get();
    }

    public static function getById($id)
    {
        return User::find($id);
    }

    public static function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public static function update($id, $data)
    {
        return User::where('id', $id)->update($data);
    }

    public static function delete($id)
    {
        return User::where('id', $id)->update(['is_active' => 0, 'deleted_at' => now()]);
    }
}
