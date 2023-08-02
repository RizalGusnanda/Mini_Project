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
            'nama_kecamatans' => 'Sukun',
        ]);

        DB::table('kecamatans')->insert([
            'nama_kecamatans' => 'Lowokwaru',
        ]);

        DB::table('kecamatans')->insert([
            'nama_kecamatans' => 'Klojen',
        ]);

        DB::table('kecamatans')->insert([
            'nama_kecamatans' => 'Kedungkadang',
        ]);

        DB::table('kecamatans')->insert([
            'nama_kecamatans' => 'Blimbing',
        ]);
    }
}
