<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeederAnyelir extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_jadwal_anyelir')->insert([
            [
                'kode_jadwal' => 'JD-01',
                'hari' => 'Senin',
                'jam' => '08:00 - 10:30',
                'kode_pelajaran' => 'PL-1',
                'kode_kelas' => 'KL-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_jadwal' => 'JD-02',
                'hari' => 'Selasa',
                'jam' => '10:30 - 13:00',
                'kode_pelajaran' => 'PL-2',
                'kode_kelas' => 'KL-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}