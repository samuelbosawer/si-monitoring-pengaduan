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
                'judul_pendampingan' => $faker->sentence(3),
                'foto_pendampingan' => '',
                'catatan_pendampingan' => $faker->paragraph(4),
                // 'catatan_pelapor' => $faker->paragraph(3),
                'status_pendampingan' => $faker->randomElement(['Proses', 'Selesai', 'Dibatalkan']),
                'pengaduan_id' => rand(1, 10),
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
            ]);
        }
    }
}
