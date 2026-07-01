<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Buscamos el id del rol 'admin'
        $adminRoleId = DB::table('roles')->where('nombre', 'admin')->first()->id;

        User::create([
            'name' => 'Administrador Huellitas',
            'email' => 'admin@huellitas.com',
            'password' => Hash::make('Admin123*'),
            'role_id' => $adminRoleId,
        ]);
    }
}