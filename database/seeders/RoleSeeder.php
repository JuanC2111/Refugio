<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['nombre' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'usuario', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}