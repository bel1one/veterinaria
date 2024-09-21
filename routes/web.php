<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;

Route::get('/', [CitaController::class, 'index'])->name("citas.index");
Route::get('/citas/create', [CitaController::class, 'create'])->name("citas.create");
Route::post('citas', [CitaController::class, 'store'])->name("citas.store");
Route::get('/citas/{cita}/edit', [CitaController::class, 'edit'])->name('citas.edit');
Route::put('/citas/{cita}', [CitaController::class, 'update'])->name('citas.update');
Route::delete('/citas/{id}', [CitaController::class, 'destroy'])->name('citas.destroy');
