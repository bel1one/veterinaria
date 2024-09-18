<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;

Route::get('/', [CitaController::class, 'index'])->name("citas.index");
Route::get('/citas/create', [CitaController::class, 'create'])->name("citas.create");
Route::post('citas', [CitaController::class, 'store'])->name("citas.store");

