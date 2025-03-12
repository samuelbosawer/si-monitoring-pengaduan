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
                // 'id_penerima' => rand(1, 5),
                'judul_pengaduan' => "Kekerasan Dalam Rumah Tangga",
                'melapor' => ["Diri Sendiri", "Orang Tua"][rand(0, 1)],
                'nama_pelapor' => ["Jhon Obeb", "Denis Welem"][rand(0, 1)],
                'jk_pelapor' => ["Pria", "Wanita"][rand(0, 1)],
                'no_hp_pelapor' => '081234567' . rand(10, 99),
                'informasi_dari' => ["Dari Iklan", "Teman/Saudara "][rand(0, 1)],
                'alamat_pelapor' => "Entrop",
                'nama_pelapor' => ["Jhon Obeb", "Denis Welem"][rand(0, 1)],
                // 'nama_panggilan_korban' => "Korban $i",
                'jenis_kelamin_korban' => ["Pria", "Wanita"][rand(0, 1)],
                'tempat_lahir_korban' => "Timika",
                'tanggal_lahir_korban' => date('Y-m-d', strtotime("-" . rand(18, 50) . " years")),
                'pekerjaan_korban' => "Petani",
                'alamat_korban' => "Entrop",
                'agama_korban' => "Kristen Protestan",
                'pendidikan_korban' => "SMA",
                'nik_korban' => rand(1000000000000000, 9999999999999999),
                'hubungan' => "Teman",
                'jumlah_anak_pria' => rand(0, 3),
                'jumlah_anak_wanita' => rand(0, 3),
                'status_pernikahan' => ["'Pisah/Percerai", "Sudah Menikah", "Belum Menikah"][rand(0, 2)],
                'nama_lengkap_pelaku' => "Pelaku $i",
                // 'nama_panggilan_pelaku' => "Pelaku $i",
                'jenis_kelamin_pelaku' => ["Pria", "Wanita"][rand(0, 1)],
                'tempat_lahir_pelaku' => "Kota $i",
                'tanggal_lahir_pelaku' => date('Y-m-d', strtotime("-" . rand(20, 60) . " years")),
                'agama_pelaku' => "Islam",
                'pendidikan_pelaku' => "S1",
                'nik_pelaku' => rand(1000000000000000, 9999999999999999),
                'no_hp_pelaku' => '081234567' . rand(10, 99),
                'pekerjaan_pelaku' => ["'Nikah Gereja(KUA)", "Nikah Adat", "Nikah Capil"][rand(0, 2)],
                'kondisi_fisik' => "Baik",
                'kondisi_psikis' => "Stres ringan",
                'kondisi_sexual' => "Normal",
                'dampak_fisik' => "Luka Ringan",
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
                'status' => 'Dalam proses',
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
            ];
        }

        Pengaduan::insert($data);

    }
}
