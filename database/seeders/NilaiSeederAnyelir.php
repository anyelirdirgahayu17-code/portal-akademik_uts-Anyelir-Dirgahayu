<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiSeederAnyelir extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_nilai_anyelir')->insert([
            [
                'nis' => '101',
                'kode_pelajaran' => 'PL-1',
                'nilai_tugas' => 85,
                'nilai_uts' => 80,
                'nilai_uas' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nis' => '102',
                'kode_pelajaran' => 'PL-2',
                'nilai_tugas' => 78,
                'nilai_uts' => 75,
                'nilai_uas' => 82,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}