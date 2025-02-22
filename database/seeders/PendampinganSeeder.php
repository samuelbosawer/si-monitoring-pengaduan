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
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            Pendampingan::create([
                'judul_pendampingan' => 'Pendampingan dari Pengaduan',
                'foto_pendampingan' => '',
                'catatan_pendampingan' => 'Dalam Proses Pengaduan',
                // 'catatan_pelapor' => $faker->paragraph(3),
                'status_pendampingan' => 'Selesai',
                'pengaduan_id' => rand(1, 10),
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
            ]);
        }
    }
}
