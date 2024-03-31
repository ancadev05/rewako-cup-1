<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('atlets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_atlet');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jk');
            $table->string('id_username_official');
            $table->string('kontingen');
            $table->string('bantu');
            $table->string('golongan');
            $table->integer('berat_badan')->nullable();
            $table->string('kelas_tanding')->nullable();
            $table->string('seni')->nullable();
            $table->string('foto_atlet');
            $table->string('akte');
            $table->string('rekomendasi');
            $table->string('izin_orangtua');
            $table->string('suket_sehat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atlets');
    }
};
