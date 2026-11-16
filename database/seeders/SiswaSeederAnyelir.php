<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeederAnyelir extends Seeder {
    public function run(): void {
        DB::table('t_siswa_anyelir')->insert([
            ['nis' => '101', 'nama_siswa' => 'Roni Satria', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '102', 'nama_siswa' => 'Budiman Halim', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '103', 'nama_siswa' => 'Syafrizal', 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '104', 'nama_siswa' => 'Juniwong', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}