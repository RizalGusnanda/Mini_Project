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
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users')->nullable();
            $table->unsignedBigInteger('id_profiles')->nullable();
            $table->text('testimoni');
            $table->integer('rating');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->restrictOnDelete();
            $table->foreign('id_profiles')->references('id')->on('profiles')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonis');
    }
};
