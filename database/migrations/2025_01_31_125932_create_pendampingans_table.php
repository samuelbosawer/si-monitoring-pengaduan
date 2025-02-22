<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendampingans', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pendampingan')->nullable();
            // $table->string('foto_pendampingan')->nullable();
            $table->text('catatan_pendampingan')->nullable();
            // $table->text('catatan_pelapor')->nullable();
            $table->string('status_pendampingan')->nullable();
            $table->bigInteger('pengaduan_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendampingans');
    }
};
