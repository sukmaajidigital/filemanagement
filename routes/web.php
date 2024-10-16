<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

// HALAMAN LANDING
Route::get('/', [LandingController::class, 'index'])->name('landing.index'); // Rute untuk index
Route::get('/dumptoseed', [LandingController::class, 'dumptoseed'])->name('dumptoseed'); // Rute untuk index


//HALAMAN VIDIO
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::post('/videos/upload', [VideoController::class, 'store'])->name('videos.store');
Route::delete('/videos/{video}', [VideoController::class, 'destroy'])->name('videos.destroy');
