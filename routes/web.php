<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SurgeriesController;
use App\Http\Controllers\SurgeryTypesController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;


Route::resources([
    'surgeries' => SurgeriesController::class,
    'surgeries.surgerytypes' => SurgeryTypesController::class,
]);

Route::get('/', [IndexController::class, 'index'])->name('index')
    ->middleware(['auth']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('profile', ProfileController::class)
    ->only(['edit', 'update', 'destroy'])
    ->middleware(['auth']);

require __DIR__.'/auth.php';
