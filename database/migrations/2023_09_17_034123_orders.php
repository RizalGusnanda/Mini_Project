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
        Schema::create('dompets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users')->nullable();
            $table->unsignedBigInteger('paket_id')->nullable();
            $table->unsignedBigInteger('pembayaran_id')->nullable();
            $table->integer('saldo');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->restrictOnDelete();
            $table->foreign('paket_id')->references('id')->on('pakets')->restrictOnDelete();
            $table->foreign('pembayaran_id')->references('id')->on('pembayarans')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dompets');
    }
};
