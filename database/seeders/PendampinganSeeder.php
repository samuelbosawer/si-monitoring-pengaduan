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
        // $faker = Faker::create();
        // for ($i = 0; $i < 20; $i++) {
        //     Pendampingan::create([
        //         'judul_pendampingan' => 'Pendampingan dari Pengaduan',
        //         'catatan_pendampingan' => 'Telah selesai Pengaduan',
        //         'status_pendampingan' => 'Selesai',
        //         'pengaduan_id' => rand(1, 10),
        //         'created_at' =>Carbon::now(),
        //         'updated_at' =>Carbon::now(),
        //     ]);
        // }


        $pendampingan = Pendampingan::create([
                    'judul_pendampingan' => 'Konsultasi Awal',
                    'catatan_pendampingan' => 'Korban melakukan konsultasi awal pada tanggal 25 Maret 2025, jam 10:00 WIT',
                    'status_pendampingan' => 'Selesai',
                    'pengaduan_id' =>1,
                    'created_at' =>Carbon::now(),
                    'updated_at' =>Carbon::now(),
            ]);



            $pendampingan = Pendampingan::create([
                'judul_pendampingan' => 'Konsultasi Awal',
                'catatan_pendampingan' => 'Korban melakukan konsultasi awal pada tanggal 25 Maret 2025, jam 10:00 WIT',
                'status_pendampingan' => 'Selesai',
                'pengaduan_id' =>2,
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
        ]);


        $pendampingan = Pendampingan::create([
            'judul_pendampingan' => 'Konsultasi Awal',
            'catatan_pendampingan' => 'Korban melakukan konsultasi awal pada tanggal 25 Maret 2025, jam 10:00 WIT',
            'status_pendampingan' => 'Selesai',
            'pengaduan_id' =>3,
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
    ]);

    }
}
