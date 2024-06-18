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
        Schema::table('atlets', function (Blueprint $table) {
            // $table->foreign('id_username_official')->references('username')->on('users')->onDelete('cascade');
            $table->foreign('kontingen', 'unique_foreign_key_name')->references('nama_kontingen')->on('kontingens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('atlets', function (Blueprint $table) {
            $table->dropForeign(['id_username_official']);
            $table->dropForeign(['kontingen']);
        });
    }
};
