<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpesialisasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spesalisasis')->insert([
            'nama_spesialisasi' => 'UI/UX Designer',
        ]);

        DB::table('spesalisasis')->insert([
            'nama_spesialisasi' => 'FrontEnd Develoepr',
        ]);

        DB::table('spesalisasis')->insert([
            'nama_spesialisasi' => 'BackEnd Develoepr',
        ]);
    }
}
