<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kecamatans')->insert([
            'kecamatan' => 'Sukun',
        ]);

        DB::table('kecamatans')->insert([
            'kecamatan' => 'Lowokwaru',
        ]);

        DB::table('kecamatans')->insert([
            'kecamatan' => 'Klojen',
        ]);

        DB::table('kecamatans')->insert([
            'kecamatan' => 'Kedungkadang',
        ]);

        DB::table('kecamatans')->insert([
            'kecamatan' => 'Blimbing',
        ]);
    }
}
