<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaSpesialisasiToSpesialisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spesalisasis', function (Blueprint $table) {
            $table->string('nama_spesialisasi'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spesalisasis', function (Blueprint $table) {
            $table->dropColumn('nama_spesialisasi'); 
        });
    }
}
