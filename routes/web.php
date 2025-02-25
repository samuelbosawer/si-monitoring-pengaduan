<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use UniSharp\LaravelFileManager\Lfm;

UniSharp\LaravelFilemanager\Lfm::routes();

// Route::get('/', function () {
//     return redirect()->route('login');
// });



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar');
Route::post('daftar/store', [HomeController::class, 'daftarStore'])->name('daftar.store');

Auth::routes();



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});





require_once 'admin.php';
