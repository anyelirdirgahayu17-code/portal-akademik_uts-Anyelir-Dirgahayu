<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeederAnyelir extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_kelas_anyelir')->insert([
            [
                'kode_kelas' => 'KL-01',
                'nama_kelas' => 'Sistem Informasi 5A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kelas' => 'KL-02',
                'nama_kelas' => 'Sistem Informasi 5B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}