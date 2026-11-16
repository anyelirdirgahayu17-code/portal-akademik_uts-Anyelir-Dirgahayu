<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_jadwal_anyelir', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jadwal', 20);
            $table->string('hari', 20);
            $table->string('jam', 30);
            $table->string('kode_pelajaran', 20);
            $table->string('kode_kelas', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_jadwal_anyelir');
    }
};