<?php

use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\dashboard\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'emailIsVerified', 'verifyTwoFA'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // user manage //
    Route::middleware('role:admin')->group(function () {
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        Route::get('/users-lists', [UsersController::class, 'lists'])->name('users.lists');
        Route::get('/users/{id}', [UsersController::class, 'edit'])->name('users.edit');
        Route::post('/users', [UsersController::class, 'store'])->name('users.store');
        Route::patch('/users/{id}', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/users', [UsersController::class, 'destroy'])->name('users.destroy');
    });
});

require __DIR__ . '/auth.php';
