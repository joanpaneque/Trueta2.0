<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SurgeriesController;
use App\Http\Controllers\SurgeryTypesController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\AntibioticsController;
use App\Http\Controllers\HealthFlagsController;

use App\Http\Controllers\AuditLogsController;
use App\Http\Controllers\UsersController;

use App\Http\Middleware\UserRegistered;
use App\Http\Middleware\CanEditProfile;


Route::middleware(['auth', UserRegistered::class])->group(function () {
    Route::get('/surgeries/{surgery}/types/{type}/flags/results', [HealthFlagsController::class, 'results'])->name('surgeries.types.flags.results');
    Route::resources([
        'surgeries' => SurgeriesController::class,
        'surgeries.types' => SurgeryTypesController::class,
        'surgeries.types.flags' => HealthFlagsController::class,
        'surgeries.types.results' => HealthFlagsController::class,
    ]);

    Route::resource('antibiotics', AntibioticsController::class);
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/surgeries', [DashboardController::class, 'index'])->name('dashboard');
    Route::middleware(CanEditProfile::class)->group(function () {
        Route::resource('profile', ProfileController::class)->only(['edit', 'update', 'destroy']);
    });
    Route::resource('audit-logs', AuditLogsController::class)->only(['index', 'show']);
    Route::resource('users', UsersController::class);
    Route::put('/users/{id}/register', [UsersController::class, 'register'])->name('users.register');
    Route::put('/users/{id}/deactivate', [UsersController::class, 'deactivate'])->name('users.deactivate');

});
require __DIR__.'/auth.php';