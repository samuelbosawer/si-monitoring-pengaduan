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
                'judul_pengaduan' => "Pengaduan $i",
                'tempat' => "Lokasi $i",
                'melapor' => "2025-02-11",
                'nama_pelapor' => "Pelapor $i",
                'jk_pelapor' => ["Laki-laki", "Perempuan"][rand(0, 1)],
                'no_hp_pelapor' => '081234567' . rand(10, 99),
                'mengetahui_dari' => "Internet",
                'rujukan_dari' => "Lembaga Terkait",
                'alamat_pelapor' => "Alamat Pelapor $i",
                'nama_lengkap_korban' => "Korban $i",
                'nama_panggilan_korban' => "Korban $i",
                'jenis_kelamin_korban' => ["Laki-laki", "Perempuan"][rand(0, 1)],
                'tempat_lahir_korban' => "Kota $i",
                'tanggal_lahir_korban' => date('Y-m-d', strtotime("-" . rand(18, 50) . " years")),
                'pekerjaan_korban' => "Pekerjaan $i",
                'alamat_korban' => "Alamat Korban $i",
                'agama_korban' => "Kristen",
                'pendidikan_korban' => "SMA",
                'nik_korban' => rand(1000000000000000, 9999999999999999),
                'hubungan' => "Keluarga",
                'jumlah_anak_pria' => rand(0, 3),
                'jumlah_anak_wanita' => rand(0, 3),
                'status_pernikahan' => ["Menikah", "Lajang", "Duda/Janda"][rand(0, 2)],
                'nama_lengkap_pelaku' => "Pelaku $i",
                'nama_panggilan_pelaku' => "Pelaku $i",
                'jenis_kelamin_pelaku' => ["Laki-laki", "Perempuan"][rand(0, 1)],
                'tempat_lahir_pelaku' => "Kota $i",
                'tanggal_lahir_pelaku' => date('Y-m-d', strtotime("-" . rand(20, 60) . " years")),
                'agama_pelaku' => "Islam",
                'pendidikan_pelaku' => "S1",
                'nik_pelaku' => rand(1000000000000000, 9999999999999999),
                'no_hp_pelaku' => '081234567' . rand(10, 99),
                'pekerjaan_pelaku' => "Pekerjaan Pelaku $i",
                'kondisi_fisik' => "Baik",
                'kondisi_psikis' => "Stres ringan",
                'kondisi_sexual' => "Normal",
                'dampak_fisik' => "Luka ringan",
                'dampak_psikis' => "Trauma",
                'dampak_sex' => "Tidak ada",
                'dampak_ekonomi' => "Kehilangan pekerjaan",
                'dampak_kesehatan' => "Gangguan tidur",
                'dampak_lainnya' => "",
                'kasus_domestik' => true,
                'kasus_publik' => false,
                'kasus_lainnya' => false,
                'uraian_kejadian' => "Kejadian $i terjadi pada waktu dan tempat tertentu.",
                'user_id' => rand(1, 2),
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
            ];
        }

        Pengaduan::insert($data);

    }
}
