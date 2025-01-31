<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'pelapor',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'kepaladinas',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'kepalabidang',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'pendampingdinas',
            'guard_name' => 'web',
        ]);
    }
}
