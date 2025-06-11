<?php

use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(PengaduanController::class)->group(function(){
        Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
        Route::get('pengaduan/tambah', [PengaduanController::class, 'create'])->name('pengaduan.tambah')->middleware(['role:pelapor']);
        Route::get('pengaduan/detail/{id}', [PengaduanController::class, 'show'])->name('pengaduan.detail');
        Route::delete('pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.hapus');
        Route::post('pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store')->middleware(['role:pelapor']);
        Route::get('pengaduan/{id}/ubah', [PengaduanController::class, 'edit'])->name('pengaduan.ubah')->middleware(['role:pelapor']);
        Route::put('pengaduan/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update')->middleware(['role:pelapor']);
        Route::put('pengaduan-status/{id}', [PengaduanController::class, 'update_status'])->name('pengaduan.update.status')->middleware(['role:kepalabidang']);;

        Route::get('pengaduan/excel', [PengaduanController::class, 'excel'])->name('pengaduan.excel');


        Route::get('pengaduan/pdf/cetak', [PengaduanController::class, 'pdf'])->name('pengaduan.pdf')->middleware(['role:kepalabidang|kepaladinas|pendampingdinas']);

        Route::get('pengaduan/pdfdetail/cetak/{id}', [PengaduanController::class, 'pdfdetail'])->name('pengaduan.pdfdetail.cetak')->middleware(['role:kepalabidang|kepaladinas|pendampingdinas']);

        Route::post('pengaduan/csv', [PengaduanController::class, 'csv'])->name('pendampingan.csv');
    });
});
