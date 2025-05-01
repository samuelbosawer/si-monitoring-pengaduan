<?php

namespace Database\Seeders;

use App\Models\Pendampingan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PendampinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //  Kasus I

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Pendampingan Hukum',
            'catatan_pendampingan'    => 'Korban didampingi oleh pengacara dari Perkumpulan Pengacara Hak Asasi Manusia untuk Papua, yang membantu dalam proses hukum dan memastikan hak-hak korban terpenuhi',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 1,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2004, 5, 20, 9, 30, 0),
            'updated_at'              => Carbon::create(2004, 5, 20, 9, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Pendampingan Psikologis',
            'catatan_pendampingan'    => 'Korban menerima dukungan emosional dan konseling untuk mengatasi trauma akibat kekerasan yang dialaminya.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 1,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2004, 5, 30, 9, 30, 0),
            'updated_at'              => Carbon::create(2004, 5, 30, 9, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Fasilitasi Pelaporan',
            'catatan_pendampingan'    => 'Pendamping membantu korban dalam proses pelaporan ke pihak kepolisian dan memastikan bahwa kasusnya ditangani dengan serius.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 1,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2004, 5, 30, 9, 30, 0),
            'updated_at'              => Carbon::create(2004, 5, 30, 9, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Advokasi dan Publikasi',
            'catatan_pendampingan'    => 'Kasus ini dipublikasikan untuk meningkatkan kesadaran masyarakat tentang pentingnya penanganan serius terhadap kasus KDRT, terutama yang melibatkan pejabat publik.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 1,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2004, 5, 30, 9, 30, 0),
            'updated_at'              => Carbon::create(2004, 5, 30, 9, 30, 0),
        ]);


        //  Kasus 2
        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Advokasi dan Publikasi',
            'catatan_pendampingan'    => 'Melakukan asesmen untuk menilai kondisi mental dan emosional korban, guna menentukan bentuk dukungan yang diperlukan.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 2,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2004, 11, 07, 9, 30, 0),
            'updated_at'              => Carbon::create(2004, 11, 07, 9, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Pendampingan Hukum',
            'catatan_pendampingan'    => 'Bekerja sama dengan Lembaga Bantuan Hukum (LBH) untuk memastikan korban mendapatkan pendampingan dalam proses hukum. ',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 2,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2004, 11, 14, 9, 30, 0),
            'updated_at'              => Carbon::create(2004, 11, 14, 9, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Dukungan Psikososial',
            'catatan_pendampingan'    => 'Memberikan konseling dan dukungan psikososial untuk membantu korban mengatasi trauma dan memulihkan kondisi mentalnya. ',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 2,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2004, 11, 14, 9, 30, 0),
            'updated_at'              => Carbon::create(2004, 11, 14, 9, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Koordinasi dengan Pihak Terkait',
            'catatan_pendampingan'    => 'Berkoordinasi dengan kepolisian dan lembaga terkait lainnya untuk memastikan proses hukum berjalan dengan lancar dan korban mendapatkan perlindungan yang maksimal.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 2,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2004, 11, 14, 9, 30, 0),
            'updated_at'              => Carbon::create(2004, 11, 14, 9, 30, 0),
        ]);

        // Kasus 3
        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Pendampingan Hukum',
            'catatan_pendampingan'    => 'Korban didampingi oleh pengacara dari Perkumpulan Pengacara Hak Asasi Manusia untuk Papua, yang membantu dalam proses hukum dan memastikan hak-hak korban terpenuhi.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 3,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 14, 9, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 14, 9, 30, 0),
        ]);


        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Pendampingan Psikologis',
            'catatan_pendampingan'    => 'Korban menerima dukungan emosional dan konseling untuk mengatasi trauma akibat kekerasan yang dialaminya.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 3,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 20, 9, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 20, 9, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Fasilitasi Pelaporan',
            'catatan_pendampingan'    => 'Pendamping membantu korban dalam proses pelaporan ke pihak kepolisian dan memastikan bahwa kasusnya ditangani dengan serius.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 3,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 21, 9, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 21, 9, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Advokasi dan Publikasi',
            'catatan_pendampingan'    => 'Kasus ini dipublikasikan untuk meningkatkan kesadaran masyarakat tentang pentingnya penanganan serius terhadap kasus kekerasan fisik terhadap anak.
Pendampingan ini bertujuan untuk memastikan korban mendapatkan keadilan dan dukungan yang diperlukan dalam proses pemulihan.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 3,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 21, 9, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 21, 9, 30, 0),
        ]);


        // Kasus 4
        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Pendampingan Psikologis',
            'catatan_pendampingan'    => 'Korban mendapatkan dukungan dari psikolog untuk membantu mengatasi trauma dan stres akibat kekerasan yang dialami.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 4,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 30, 9, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 30, 9, 30, 0),
        ]);


        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Mediasi dan Konseling Keluarga',
            'catatan_pendampingan'    => 'Pendamping melakukan mediasi antara korban dan keluarga untuk memperbaiki hubungan dan menciptakan lingkungan yang mendukung pemulihan korban.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 4,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 30, 9, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 30, 9, 30, 0),
        ]);


        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Rujukan ke Layanan Hukum',
            'catatan_pendampingan'    => 'Jika diperlukan, korban dan keluarga dirujuk ke layanan hukum untuk memastikan hak-hak korban terlindungi dan pelaku mendapatkan sanksi yang sesuai.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 4,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 19, 01, 9, 30, 0),
            'updated_at'              => Carbon::create(2003, 10, 01, 9, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Pemantauan Berkala',
            'catatan_pendampingan'    => 'Pendamping melakukan pemantauan berkala terhadap kondisi korban untuk memastikan proses pemulihan berjalan dengan baik dan korban mendapatkan dukungan yang dibutuhkan.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 4,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 19, 03, 9, 30, 0),
            'updated_at'              => Carbon::create(2003, 10, 03, 9, 30, 0),
        ]);


        // Kasus 5
        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Identifikasi dan Asesmen Awal',
            'catatan_pendampingan'    => 'Tim UPTD PPA bersama pemerintah kelurahan melakukan identifikasi terhadap kondisi anak-anak tersebut, termasuk kebutuhan dasar seperti pangan, pakaian, dan tempat tinggal.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 5,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 07, 14, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 07, 14, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Penjangkauan dan Perlindungan Sementara',
            'catatan_pendampingan'    => 'Anak-anak tersebut dibawa ke fasilitas penampungan sementara untuk memastikan keamanan dan kesejahteraan mereka selama proses penyelidikan berlangsung.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 5,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 10, 14, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 10, 14, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Pendampingan Psikologis',
            'catatan_pendampingan'    => 'Korban mendapatkan dukungan psikologis untuk mengatasi dampak emosional akibat penelantaran yang dialami.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 5,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 11, 14, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 11, 14, 30, 0),
        ]);

        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Koordinasi dengan Lembaga Terkait',
            'catatan_pendampingan'    => 'UPTD PPA berkoordinasi dengan Dinas Sosial, kepolisian, dan lembaga perlindungan anak untuk memastikan penanganan kasus sesuai dengan prosedur hukum dan hak-hak anak.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 5,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 14, 14, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 14, 14, 30, 0),
        ]);


        $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Penyusunan Rencana Tindak Lanjut',
            'catatan_pendampingan'    => 'Setelah asesmen, disusun rencana tindak lanjut yang meliputi kemungkinan reunifikasi dengan keluarga, adopsi, atau penempatan di panti asuhan, tergantung pada hasil evaluasi dan kebutuhan anak.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 5,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 15, 14, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 15, 14, 30, 0),
        ]);



         // Kasus 5
         $pendampingan = Pendampingan::create([
            'judul_pendampingan'      => 'Identifikasi dan Asesmen Awal',
            'catatan_pendampingan'    => 'Tim UPTD PPA bersama pemerintah kelurahan melakukan identifikasi terhadap kondisi anak-anak tersebut, termasuk kebutuhan dasar seperti pangan, pakaian, dan tempat tinggal.',
            'status_pendampingan'     => 'Selesai',
            'pengaduan_id'            => 6,
            'jenis_pelayanan'         => 'Pengaduan Masyarakat',
            'created_at'              => Carbon::create(2003, 11, 07, 14, 30, 0),
            'updated_at'              => Carbon::create(2003, 11, 07, 14, 30, 0),
        ]);


        // Seeder Pendampingan
for ($pengaduanId = 6; $pengaduanId <= 31; $pengaduanId++) {
    // Set tanggal awal berdasarkan urutan pengaduan
    $startDate = Carbon::create(2004, 1, 1)->addDays(($pengaduanId - 6) * 10);

    // Pendampingan 1
    Pendampingan::create([
        'judul_pendampingan'      => 'Identifikasi Awal Kasus',
        'catatan_pendampingan'    => 'Tim melakukan identifikasi awal terkait laporan yang masuk.',
        'status_pendampingan'     => 'Selesai',
        'pengaduan_id'            => $pengaduanId,
        'jenis_pelayanan'         => 'Konsultasi Awal',
        'created_at'              => $startDate,
        'updated_at'              => $startDate,
    ]);

    // Pendampingan 2
    Pendampingan::create([
        'judul_pendampingan'      => 'Asesmen Lanjutan',
        'catatan_pendampingan'    => 'Melakukan asesmen psikologis dan medis terhadap korban.',
        'status_pendampingan'     => 'Proses',
        'pengaduan_id'            => $pengaduanId,
        'jenis_pelayanan'         => 'Pendampingan Psikologis',
        'created_at'              => $startDate->copy()->addDays(3),
        'updated_at'              => $startDate->copy()->addDays(3),
    ]);

    // Pendampingan 3
    Pendampingan::create([
        'judul_pendampingan'      => 'Rekomendasi Tindak Lanjut',
        'catatan_pendampingan'    => 'Merekomendasikan langkah hukum dan perlindungan lanjutan.',
        'status_pendampingan'     => 'Selesai',
        'pengaduan_id'            => $pengaduanId,
        'jenis_pelayanan'         => 'Pendampingan Hukum',
        'created_at'              => $startDate->copy()->addDays(7),
        'updated_at'              => $startDate->copy()->addDays(7),
    ]);


    }
}
}
