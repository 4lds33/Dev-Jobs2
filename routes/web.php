<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;
use App\Livewire\CrearVacante;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [VacanteController::class, 'index']
)->middleware(['auth', 'verified'])->name('vacantes.index');

Route::get('/vacantes/crear', CrearVacante::class)->middleware(
    'auth')->name('vacantes.crear');


Route::get('/vacantes/create', [VacanteController::class, 'create']
)->middleware(['auth', 'verified'])->name('vacantes.create');

Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'editar']
)->middleware(['auth', 'verified'])->name('vacantes.edit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
