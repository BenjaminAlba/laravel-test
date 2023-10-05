<?php

namespace Database\Seeders;

use DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('pass1234'),
                'role' => 'administrador',
            ],
            [
                'name' => 'proveedor1',
                'email' => 'proveedor1@provider.com',
                'password' => bcrypt('pass1234'),
                'role' => 'proveedor',
            ],
        ]);
    }
}
