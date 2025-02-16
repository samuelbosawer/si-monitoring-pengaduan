<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('home');
            require_once 'admin/pengaduan.php';

            require_once 'admin/pendampingan.php';
    });
});
