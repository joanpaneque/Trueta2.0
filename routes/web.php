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



Route::get('/surgeries/{surgery}/types/{type}/flags/results', [HealthFlagsController::class, 'results'])->name('surgeries.types.flags.results');
Route::resources([
    'surgeries' => SurgeriesController::class,
    'surgeries.types' => SurgeryTypesController::class,
    'surgeries.types.flags' => HealthFlagsController::class,
    'surgeries.types.results' => HealthFlagsController::class,
]);

Route::resource('antibiotics', AntibioticsController::class)
    ->middleware(['auth']);

Route::get('/', [IndexController::class, 'index'])->middleware(['auth'])->name('index');
Route::get('/surgeries', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('profile', ProfileController::class)->only(['edit', 'update', 'destroy'])->middleware(['auth']);

require __DIR__.'/auth.php';
