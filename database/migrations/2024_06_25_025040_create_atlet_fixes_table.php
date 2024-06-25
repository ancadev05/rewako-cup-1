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
        Schema::create('atlet_fixes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_atlet');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jk');
            $table->string('id_username_official');
            $table->string('kontingen');
            $table->string('golongan');
            $table->string('kelas_tanding')->nullable();
            $table->string('seni')->nullable();
            $table->string('foto_atlet');
            $table->integer('bayar')->default(0);
            $table->integer('verifikasi')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atlet_fixes');
    }
};
