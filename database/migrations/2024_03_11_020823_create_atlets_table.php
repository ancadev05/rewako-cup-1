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
            // $table->string('angka');
            $table->string('id_golongan');
            $table->string('id_kontingen');
            $table->string('id_kelas_tanding');
            $table->string('id_seni');
            // $table->foreign('id_golongan')->on('golongans')->references('id');
            // $table->foreign('id_kontingen')->on('kontingens')->references('id');
            // $table->foreign('id_kelas_tanding')->on('kelas_tandings')->references('id');
            // $table->foreign('id_seni')->on('senis')->references('id');
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
