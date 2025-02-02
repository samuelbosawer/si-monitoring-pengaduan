<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect()->route('login');
});



Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar');
Route::post('daftar/store', [HomeController::class, 'daftarStore'])->name('daftar.store');

Auth::routes();



require_once 'admin.php';
