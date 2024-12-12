<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {

        try {
            $user = UserRepository::getById($request->user()->id);
            // dd(Hash::check($request->current_password, $user->password));
            if ($user && !Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'Invalid current password');
            }

            UserRepository::update($request->user()->id, [
                'password' => Hash::make($request->input('password')),
            ]);

            return back()->with('success', 'Updated password.');
        } catch (\Throwable $th) {
            dd($th);
            return back()->with('error', 'Cannot updated password.');
        }
    }
}
