<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Pelapor 1',
            'email' => 'pelapor1@gmail.com',
            'no_hp' => '0821981232',
            'password' =>  bcrypt('pelapor1@gmail.com')
        ]);
        $admin->assignRole('pelapor');

        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Pelapor 2',
            'email' => 'pelapor2@gmail.com',
            'no_hp' => '0821981231',
            'password' =>  bcrypt('pelapor2@gmail.com')
        ]);
        $admin->assignRole('pelapor');


        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Kepala Bidang',
            'email' => 'kepalabidang@gmail.com',
            'password' =>  bcrypt('kepalabidang@gmail.com')
        ]);
        $admin->assignRole('kepalabidang');

        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Kepala Dinas',
            'email' => 'kepaladinas@gmail.com',
            'password' =>  bcrypt('kepaladinas@gmail.com')
        ]);
        $admin->assignRole('kepaladinas');

        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Pendamping 1',
            'email' => 'pendamping1@gmail.com',
            'password' =>  bcrypt('pendamping1@gmail.com')
        ]);
        $admin->assignRole('pendampingdinas');

        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Pendamping 2',
            'email' => 'pendamping2@gmail.com',
            'password' =>  bcrypt('pendamping2@gmail.com')
        ]);
        $admin->assignRole('pendampingdinas');

        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Pendamping 3',
            'email' => 'pendamping3@gmail.com',
            'password' =>  bcrypt('pendamping3@gmail.com')
        ]);
        $admin->assignRole('pendampingdinas');


    }
}
