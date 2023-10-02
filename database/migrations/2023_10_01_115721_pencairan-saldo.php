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
        Schema::create('pencairan_saldo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users')->nullable();
            $table->integer('jumlah');
            $table->enum('status', ['disetujui', 'ditolak'])->default('ditolak');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->restrictOnDelete();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pencairan_saldo');
    }
};