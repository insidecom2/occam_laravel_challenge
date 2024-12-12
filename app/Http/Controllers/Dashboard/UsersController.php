<?php

namespace App\Http\Controllers\dashboard;

use App\Events\RegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index');
    }

    public function lists()
    {
        $users = UserRepository::getAll();
        return response()->json([
            'data' => $users,
        ], 200);
    }

    public function edit(Request $request)
    {
        $user = UserRepository::getById($request->id);
        return view('dashboard.user.edit', compact('user'));
    }

    public function update(string $id, UpdateUserRequest $request)
    {
        $user = UserRepository::getById($id);
        $emailVerifiedAt = $request->email_verified_at == '-' ? null : $request->email_verified_at;

        UserRepository::update($id, [
            'name' => $request->name,
            'is_email_2fa' => $request->is_email_2fa,
            'email_verified_at' => $emailVerifiedAt == null  ? null : ($user['email_verified_at'] ? $user['email_verified_at'] : $emailVerifiedAt),
            'role' => $request->role
        ]);
        return redirect()->route('users.index')->with('success', 'User updated.');
    }

    public function store(CreateUserRequest $request)
    {
        try {
            UserRepository::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('users.index')->with('success', 'User created.');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error', 'Cannot create user. Please try again.');
        }
    }

    public function destroy(Request $request)
    {
        try {
            UserRepository::delete($request->id);
            return redirect()->route('users.index')->with('success', 'User deleted.');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error', 'Cannot delete user. Please try again ');
        }
    }
}
