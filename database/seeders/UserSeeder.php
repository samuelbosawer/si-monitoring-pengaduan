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
        // 1
        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Pelapor 1',
            'email' => 'pelapor1@gmail.com',
            'no_hp' => '0821981232',
            'password' =>  bcrypt('pelapor1@gmail.com')
        ]);
        $admin->assignRole('pelapor');

        // 2
        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Pelapor 2',
            'email' => 'pelapor2@gmail.com',
            'no_hp' => '0821981231',
            'password' =>  bcrypt('pelapor2@gmail.com')
        ]);
        $admin->assignRole('pelapor');

        // 3
        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Kepala Bidang',
            'email' => 'kepalabidang@gmail.com',
            'password' =>  bcrypt('kepalabidang@gmail.com')
        ]);
        $admin->assignRole('kepalabidang');

        // 4
        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Kepala Dinas',
            'email' => 'kepaladinas@gmail.com',
            'password' =>  bcrypt('kepaladinas@gmail.com')
        ]);
        $admin->assignRole('kepaladinas');

        // 5
        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Pendamping 1',
            'email' => 'pendamping1@gmail.com',
            'password' =>  bcrypt('pendamping1@gmail.com')
        ]);
        $admin->assignRole('pendampingdinas');

        // 6
        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Pendamping 2',
            'email' => 'pendamping2@gmail.com',
            'password' =>  bcrypt('pendamping2@gmail.com')
        ]);
        $admin->assignRole('pendampingdinas');

        // 7
        $admin = User::create([
            // 'user' => 'Admin',
            'name' => 'Pendamping 3',
            'email' => 'pendamping3@gmail.com',
            'password' =>  bcrypt('pendamping3@gmail.com')
        ]);
        $admin->assignRole('pendampingdinas');


        // ===== Real Users (ID 8 and onward) =====

        // User ID: 8
        $admin = User::create([
            'name' => 'Jesika',
            'email' => 'jesika@gmail.com',
            'no_hp' => '0821981234',
            'password' => bcrypt('jesika@gmail.com')
        ]);
        $admin->assignRole('pelapor');

        // User ID: 9
        $admin = User::create([
            'name' => 'Welem',
            'email' => 'welem@gmail.com',
            'no_hp' => '0821981235',
            'password' => bcrypt('welem@gmail.com')
        ]);
        $admin->assignRole('pelapor');

        // User ID: 10
        $admin = User::create([
            'name' => 'Yakop',
            'email' => 'yakop@gmail.com',
            'no_hp' => '0821981236',
            'password' => bcrypt('yakop@gmail.com')
        ]);
        $admin->assignRole('pelapor');

        // User ID: 11
        $admin = User::create([
            'name' => 'Obed',
            'email' => 'obed@gmail.com',
            'no_hp' => '0821981237',
            'password' => bcrypt('obed@gmail.com')
        ]);
        $admin->assignRole('pelapor');

        // User ID: 12
        $admin = User::create([
            'name' => 'Angel',
            'email' => 'angel@gmail.com',
            'no_hp' => '0821981238',
            'password' => bcrypt('angel@gmail.com')
        ]);
        $admin->assignRole('pelapor');
    }
}
