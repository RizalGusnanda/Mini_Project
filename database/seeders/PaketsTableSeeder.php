<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Paket;

class PaketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Paket::create([
        //     'nama_paket' => 'Paket Basic',
        //     'deskripsi' => 'Paket belajar dasar dengan kelas dilakukan 1 kali seminggu, dan materi latihan.',
        //     'harga' => 100000,
        // ]);

        
        // Paket::create([
        //     'nama_paket' => 'Paket Intermediate',
        //     'deskripsi' => 'Paket belajar menengah dengan kelas dua kali seminggu dan materi latihan lanjutan.',
        //     'harga' => 200000,
        // ]);

        
        // Paket::create([
        //     'nama_paket' => 'Paket Advanced',
        //     'deskripsi' => 'Paket belajar lanjutan dengan kelas tiga kali seminggu dan materi latihan intensif.',
        //     'harga' => 300000,
        // ]);
    }
}
