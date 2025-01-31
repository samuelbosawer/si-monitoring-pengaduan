<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Distrik;

class DistrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $distriks = [
            [
                'nama_distrik' => 'Abepura',
                'keterangan' => 'Distrik Abepura',
            ],
            [
                'nama_distrik' => 'Jayapura Utara',
                'keterangan' => 'Distrik Jayapura Utara',
            ],
            [
                'nama_distrik' => 'Jayapura Selatan',
                'keterangan' => 'Distrik Jayapura Selatan',
            ],
            [
                'nama_distrik' => 'Muara Tami',
                'keterangan' => 'Distrik Muara Tami',
            ],
            [
                'nama_distrik' => 'Heram',
                'keterangan' => 'Distrik Heram',
            ],
        ];

        foreach($distriks as $distrik){
            Distrik::create(
                [
                    'nama_distrik' => $distrik['nama_distrik'],
                    'keterangan' => $distrik['keterangan'],
                ]
            );
    }
}


}
