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
        Schema::table('moduls', function (Blueprint $table) {
            $table->string('nama_modul');
            $table->string('modul');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moduls', function (Blueprint $table) {
            $table->dropColumn('nama_modul');
            $table->dropColumn('modul');
        });
    }
};
