<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;
use App\Livewire\CrearVacante;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard principal
Route::get('/dashboard', [VacanteController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard'); // ✅ nombre usado por Laravel después del login
Route::get('/vacantes', function () {
    return redirect()->route('dashboard');
})->name('vacantes.index');

// Crear vacante (componente Livewire)
Route::get('/vacantes/crear', CrearVacante::class)
    ->middleware(['auth', 'verified'])
    ->name('vacantes.crear');

// Ver detalles de una vacante
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('vacantes.show');

// Editar vacante
Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('vacantes.edit');

// Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, registro, etc.)
require __DIR__.'/auth.php';
