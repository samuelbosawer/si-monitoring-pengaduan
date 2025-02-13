<?php

use App\Http\Controllers\PendampinganController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(PendampinganController::class)->group(function(){
        Route::get('pendampingan', [PendampinganController::class, 'index'])->name('pendampingan');
        Route::get('pendampingan/tambah', [PendampinganController::class, 'create'])->name('pendampingan.tambah');
        Route::get('pendampingan/detail/{id}', [PendampinganController::class, 'show'])->name('pendampingan.detail');
        Route::delete('pendampingan/{id}', [PendampinganController::class, 'destroy'])->name('pendampingan.hapus');
        Route::post('pendampingan/store', [PendampinganController::class, 'store'])->name('pendampingan.store');
        Route::get('pendampingan/{id}/ubah', [PendampinganController::class, 'edit'])->name('pendampingan.ubah');
        Route::put('pendampingan/{id}', [PendampinganController::class, 'update'])->name('pendampingan.update');

        Route::get('pendampingan/detail/sub/{id}', [PendampinganController::class, 'pendampinganDetail'])->name('pendampingan.detail.sub');


        Route::get('pendampingan/excel', [PendampinganController::class, 'excel'])->name('pendampingan.excel');
        Route::get('pendampingan/pdf', [PendampinganController::class, 'pdf'])->name('pendampingan.pdf');
        Route::post('pendampingan/csv', [PendampinganController::class, 'csv'])->name('pendampingan.csv');
    });
});
