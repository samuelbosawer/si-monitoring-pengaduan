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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();

            // Dinas
            $table->bigInteger('id_penerima')->nullable();
            $table->string('tempat')->nullable();
            $table->string('melapor')->nullable();
            $table->string('status')->nullable();

            // Pelabor
            $table->string('nama_pelapor')->nullable();
            $table->string('jk_pelapor')->nullable();
            $table->text('alamat_pelapor')->nullable();
            $table->string('no_hp_pelapor')->nullable();
            $table->string('informasi_dari')->nullable();
            $table->string('mengetahui_dari')->nullable();
            $table->string('rujukan_dari')->nullable();

            // korban
            $table->string('nama_lengkap_korban')->nullable();
            $table->string('jenis_kelamin_korban')->nullable();
            $table->string('nama_panggilan_korban')->nullable();
            $table->string('tempat_lahir_korban')->nullable();
            $table->string('tanggal_lahir_korban')->nullable();
            $table->text('alamat_korban')->nullable();
            $table->string('pekerjaan_korban')->nullable();
            $table->string('agama_korban')->nullable();
            $table->string('pendidikan_korban')->nullable();
            $table->string('nik_korban')->nullable();
            $table->string('hubungan')->nullable();
            $table->string('jumlah_anak_pria')->nullable();
            $table->string('jumlah_anak_wanita')->nullable();
            $table->string('no_hp_korban')->nullable();

            // Pelaku
            $table->string('nama_lengkap_pelaku')->nullable();
            $table->string('jenis_kelamin_pelaku')->nullable();
            $table->string('nama_panggilan_pelaku')->nullable();
            $table->string('tempat_lahir_pelaku')->nullable();
            $table->string('tanggal_lahir_pelaku')->nullable();
            $table->text('alamat_pelaku')->nullable();
            $table->string('pekerjaan_pelaku')->nullable();
            $table->string('agama_pelaku')->nullable();
            $table->string('pendidikan_pelaku')->nullable();
            $table->string('nik_pelaku')->nullable();
            $table->string('no_hp_pelaku')->nullable();

            // kondisi
            $table->text('kondisi_fisik')->nullable();
            $table->text('kondisi_psikis')->nullable();
            $table->text('kondisi_sexual')->nullable();
            $table->text('kondisi_lain-lain')->nullable();

            // dampak
            $table->text('dampak_fisik')->nullable();
            $table->text('dampak_psikis')->nullable();
            $table->text('dampak_sex')->nullable();
            $table->text('dampak_ekonomi')->nullable();
            $table->text('dampak_kesehatan')->nullable();
            $table->text('dampah_lainnya')->nullable();

            // Kasus
            $table->text('kasus_domestik')->nullable();
            $table->text('kasus_publick')->nullable();
            $table->text('kasus_lainnya')->nullable();
            $table->text('uraian_kejadian')->nullable();

            // surat
            $table->string('surat_nikah_gereja')->nullable();
            $table->string('aket_nikah_sipil')->nullable();
            $table->string('aket_cerai_sipil')->nullable();
            $table->string('akte_nikah_kua')->nullable();
            $table->string('akte_cerai_kua')->nullable();
            $table->string('akte_kelahiran_anak')->nullable();

            $table->bigInteger('user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
