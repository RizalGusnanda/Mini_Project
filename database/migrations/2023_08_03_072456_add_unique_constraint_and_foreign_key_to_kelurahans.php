<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        // Menambahkan kolom id_kecamatans dengan relasi ke tabel kecamatans
        Schema::table('kelurahans', function (Blueprint $table) {
            $table->bigInteger('id_kecamatans')->unsigned()->nullable();
            $table->foreign('id_kecamatans')->references('id')->on('kecamatans');
        });

        // Membuat kolom nama_kelurahans menjadi unique
        Schema::table('kelurahans', function (Blueprint $table) {
            $table->unique('nama_kelurahans');
        });
    }

    /**
     * Balikkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        // Drop foreign key constraint
        Schema::table('kelurahans', function (Blueprint $table) {
            $table->dropForeign(['id_kecamatans']);
        });

        // Drop kolom id_kecamatans
        Schema::table('kelurahans', function (Blueprint $table) {
            $table->dropColumn('id_kecamatans');
        });

        // Drop unique constraint dari kolom nama_kelurahans
        Schema::table('kelurahans', function (Blueprint $table) {
            $table->dropUnique(['nama_kelurahans']);
        });
    }
};
