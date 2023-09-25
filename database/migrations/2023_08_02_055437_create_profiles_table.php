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
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->unsignedBigInteger('id_kecamatans')->nullable();
            $table->unsignedBigInteger('id_kelurahans')->nullable();
            $table->unsignedBigInteger('id_spesalisasis')->nullable();
            $table->string('telepon');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('profile')->nullable();//untuk upload image
            $table->string('alamat')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('instansi')->nullable();
            $table->string('norek')->nullable();
            $table->enum('bank',['BRI','BCA','BNI'])->nullable();
            $table->integer('pengalaman')->nullable();
            $table->text('penjelasan_pengalaman')->nullable();
            $table->enum('ajar',['Online','Offline'])->nullable();
            $table->timestamps();

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
