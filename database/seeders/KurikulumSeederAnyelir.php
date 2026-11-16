<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KurikulumSeederAnyelir extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_kurikulum_anyelir')->insert([
            [
                'kode_kurikulum' => 'KR-01',
                'nama_kurikulum' => 'Kurikulum Merdeka',
                'tahun_ajaran' => '2026/2027',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kurikulum' => 'KR-02',
                'nama_kurikulum' => 'Kurikulum 2013',
                'tahun_ajaran' => '2025/2026',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}