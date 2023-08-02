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
        ]);

        DB::table('kelurahans')->insert([
            'nama_kelurahans' => 'Lowokwaru',
        ]);

        DB::table('kelurahans')->insert([
            'nama_kelurahans' => 'Tlogomas',
        ]);

        DB::table('kelurahans')->insert([
            'nama_kelurahans' => 'Tunggulwulung',
        ]);

        DB::table('kelurahans')->insert([
            'nama_kelurahans' => 'Gadang',
        ]);
    }
}
