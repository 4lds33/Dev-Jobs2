<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use App\Livewire\CrearVacante;
use App\Livewire\EditarVacante;

// Ruta principal redirige al dashboard
Route::get('/', function () {
    return view('home');
})->name('home');


// Dashboard principal (vista de vacantes)
Route::get('/dashboard', [VacanteController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Alias de /vacantes a dashboard
Route::get('/vacantes', function () {
    return redirect()->route('dashboard');
})->name('vacantes.index');

// Crear vacante (Livewire)
Route::get('/vacantes/crear', CrearVacante::class)
    ->middleware(['auth', 'verified'])
    ->name('vacantes.crear');

// Ver vacante (controlador)
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('vacantes.show');

// Editar vacante (controlador o Livewire según tu implementación)
Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('vacantes.edit');

// Perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth (login, registro, etc.)
require __DIR__.'/auth.php';
