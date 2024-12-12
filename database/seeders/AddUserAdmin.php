<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;

class AddUserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $passwordAdmin = env('ADMIN_PASSWORD', 'password');
        $emailAdmin = env('ADMIN_EMAIL', 'admin@admin.com');

        $getUser = User::where('email', $emailAdmin)->first();

        if (!$getUser) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => $emailAdmin,
                'password' => Hash::make($passwordAdmin),
                'role' => 'admin',
            ]);
            $this->command->info('Admin user created');
            return;
        }

        $this->command->info('Admin user exists');
        return;
    }
}
