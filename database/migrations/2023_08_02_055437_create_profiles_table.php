<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id(); // Primary key dengan tipe int
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_kecamatans');
            $table->unsignedBigInteger('id_kelurahans');
            $table->unsignedBigInteger('id_spesalisasis');
            $table->integer('telepon');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('profile');
            $table->string('sertif');
            $table->integer('pengalaman');
            $table->text('penjelasan_pengalaman');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->restrictOnDelete();
            $table->foreign('id_kecamatans')->references('id')->on('kecamatans')->restrictOnDelete();
            $table->foreign('id_kelurahans')->references('id')->on('kelurahans')->restrictOnDelete();
            $table->foreign('id_spesalisasis')->references('id')->on('spesalisasis')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
