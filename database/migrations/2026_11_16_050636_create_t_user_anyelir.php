<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('t_user_anyelir', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('nama_lengkap', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_user_anyelir');
    }
};