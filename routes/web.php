<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/', function () {
    return 'hola';
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'personalInformation'])->name('admin.profile.personal_information');
            Route::post('save_personal_information', [ProfileController::class, 'savePersonalInformation'])->name('admin.profile.save_personal_information');
            Route::post('change_password', [ProfileController::class, 'changePassword'])->name('admin.profile.change_password');
        });

        Route::resource('users', UserController::class)->except(['show']);
    });
});
