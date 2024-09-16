<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;

Route::get('/', [CitaController::class, 'index'])->name("citas.index");
