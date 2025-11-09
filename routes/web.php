<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;

// Route list siswa
Route::get('/', [SiswaController::class, 'index'])->name('home');

// Route CRUD kelas
Route::resource('kelas', KelasController::class);

// Route CRUD siswa
Route::resource('siswa', SiswaController::class);
