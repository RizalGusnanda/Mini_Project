<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelurahans')->insert([
            'kelurahan' => 'Jatimulyo',
            'id_kecamatan' => 2,
        ]);

        DB::table('kelurahans')->insert([
            'kelurahan' => 'Lowokwaru',
            'id_kecamatan' => 2,
        ]);

        DB::table('kelurahans')->insert([
            'kelurahan' => 'Tlogomas',
            'id_kecamatan' => 2,
        ]);

        DB::table('kelurahans')->insert([
            'kelurahan' => 'Tunggulwulung',
            'id_kecamatan' => 2,
        ]);

        DB::table('kelurahans')->insert([
            'kelurahan' => 'Gadang',
            'id_kecamatan' => 1,
        ]);
    }
}
