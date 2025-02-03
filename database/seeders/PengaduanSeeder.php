<?php

namespace Database\Seeders;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $data[] = [
                'id_penerima' => rand(1, 5),
                'tempat' => 'Tempat Kejadian ' . $i,
                'melapor' => 'Orang yang Melapor ' . $i,
                'nama_pelapor' => 'Pelapor ' . $i,
                'jk_pelapor' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
                'alamat_pelapor' => 'Alamat Pelapor ' . $i,
                'no_hp_pelapor' => '08123456789' . $i,
                'informasi_dari' => 'Sumber Informasi ' . $i,
                'mengetahui_dari' => 'Mengetahui dari ' . $i,
                'rujukan_dari' => 'Rujukan dari ' . $i,
                'nama_lengkap_korban' => 'Korban ' . $i,
                'jenis_kelamin_korban' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
                'nama_panggilan_korban' => 'Panggilan Korban ' . $i,
                'tempat_lahir_korban' => 'Tempat Lahir ' . $i,
                'tanggal_lahir_korban' => now()->subYears(rand(10, 40))->toDateString(),
                'alamat_korban' => 'Alamat Korban ' . $i,
                'pekerjaan_korban' => 'Pekerjaan ' . $i,
                'agama_korban' => 'Agama ' . $i,
                'pendidikan_korban' => 'Pendidikan ' . $i,
                'nik_korban' => '12345678901234' . $i,
                'hubungan' => 'Hubungan dengan pelaku ' . $i,
                'jumlah_anak_pria' => rand(0, 3),
                'jumlah_anak_wanita' => rand(0, 3),
                'no_hp_korban' => '08129876543' . $i,
                'nama_lengkap_pelaku' => 'Pelaku ' . $i,
                'jenis_kelamin_pelaku' => ['Laki-laki', 'Perempuan'][rand(0, 1)],
                'nama_panggilan_pelaku' => 'Panggilan Pelaku ' . $i,
                'tempat_lahir_pelaku' => 'Tempat Lahir ' . $i,
                'tanggal_lahir_pelaku' => now()->subYears(rand(20, 50))->toDateString(),
                'alamat_pelaku' => 'Alamat Pelaku ' . $i,
                'pekerjaan_pelaku' => 'Pekerjaan ' . $i,
                'agama_pelaku' => 'Agama ' . $i,
                'pendidikan_pelaku' => 'Pendidikan ' . $i,
                'nik_pelaku' => '98765432109876' . $i,
                'no_hp_pelaku' => '08134567890' . $i,
                'kondisi_fisik' => 'Kondisi fisik ' . $i,
                'kondisi_psikis' => 'Kondisi psikis ' . $i,
                'kondisi_sexual' => 'Kondisi seksual ' . $i,
                'kondisi_lain-lain' => 'Kondisi lain ' . $i,
                'dampak_fisik' => 'Dampak fisik ' . $i,
                'dampak_psikis' => 'Dampak psikis ' . $i,
                'dampak_sex' => 'Dampak seksual ' . $i,
                'dampak_ekonomi' => 'Dampak ekonomi ' . $i,
                'dampak_kesehatan' => 'Dampak kesehatan ' . $i,
                'dampah_lainnya' => 'Dampak lainnya ' . $i,
                'kasus_domestik' => 'Kasus domestik ' . $i,
                'kasus_publick' => 'Kasus publik ' . $i,
                'kasus_lainnya' => 'Kasus lainnya ' . $i,
                'uraian_kejadian' => 'Uraian kejadian ' . $i,
                'surat_nikah_gereja' => null,
                'aket_nikah_sipil' => null,
                'aket_cerai_sipil' => null,
                'akte_nikah_kua' => null,
                'akte_cerai_kua' => null,
                'akte_kelahiran_anak' => null,
                'user_id' => ['1', '2'][rand(0, 1)],
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
            ];
        }

        Pengaduan::insert($data);
    }
}
