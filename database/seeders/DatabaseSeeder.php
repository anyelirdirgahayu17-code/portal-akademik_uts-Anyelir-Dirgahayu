<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeederAnyelir::class,
            SiswaSeederAnyelir::class,
            PelajaranSeederAnyelir::class,
            KurikulumSeederAnyelir::class,
            KelasSeederAnyelir::class,
            JadwalSeederAnyelir::class,
            NilaiSeederAnyelir::class,
        ]);
    }
}