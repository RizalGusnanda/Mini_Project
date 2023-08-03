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
            'nama_kelurahans' => 'Jatimulyo',
            'id_kecamatans' => 2,
        ]);

        DB::table('kelurahans')->insert([
            'nama_kelurahans' => 'Lowokwaru',
            'id_kecamatans' => 2,
        ]);

        DB::table('kelurahans')->insert([
            'nama_kelurahans' => 'Tlogomas',
            'id_kecamatans' => 2,
        ]);

        DB::table('kelurahans')->insert([
            'nama_kelurahans' => 'Tunggulwulung',
            'id_kecamatans' => 2,
        ]);

        DB::table('kelurahans')->insert([
            'nama_kelurahans' => 'Gadang',
            'id_kecamatans' => 1,
        ]);
    }
}
