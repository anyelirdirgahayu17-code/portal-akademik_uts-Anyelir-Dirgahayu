<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelajaranSeederAnyelir extends Seeder {
    public function run(): void {
        DB::table('t_pelajaran_anyelir')->insert([
            ['kode_pelajaran' => 'PL-1', 'nama_pelajaran' => 'Matematika', 'created_at' => now(), 'updated_at' => now()],
            ['kode_pelajaran' => 'PL-2', 'nama_pelajaran' => 'Bahasa Inggris', 'created_at' => now(), 'updated_at' => now()],
            ['kode_pelajaran' => 'PL-3', 'nama_pelajaran' => 'Bahasa Indonesia', 'created_at' => now(), 'updated_at' => now()],
            ['kode_pelajaran' => 'PL-4', 'nama_pelajaran' => 'Pancasila', 'created_at' => now(), 'updated_at' => now()],
            ['kode_pelajaran' => 'PL-5', 'nama_pelajaran' => 'Fisika', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}