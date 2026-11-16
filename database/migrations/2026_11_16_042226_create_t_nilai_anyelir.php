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
        Schema::create('t_nilai_anyelir', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 20);
            $table->string('kode_pelajaran', 20);
            $table->double('nilai_tugas');
            $table->double('nilai_uts');
            $table->double('nilai_uas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_nilai_anyelir');
    }
};