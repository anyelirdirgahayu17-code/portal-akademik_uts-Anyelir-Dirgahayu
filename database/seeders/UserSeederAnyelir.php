<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeederAnyelir extends Seeder
{
    public function run(): void
    {
        DB::table('t_user_anyelir')->insert([
            'username' => 'anyelir',
            'password' => Hash::make('123456'), // Password terenkripsi
            'nama_lengkap' => 'Anyelir Dirgahayu',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}