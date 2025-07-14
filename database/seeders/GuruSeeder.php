<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nama' => 'Naufal',
            'nip' => '18263891263',
            'mapel_id' => 1,
            'no_telp' => '0883912739172',
            'alamat' => 'Jl Cinta',


        ]);
        Guru::create([
            'nama' => 'Raihan',
            'nip' => '81267389126893',
            'mapel_id' => 2,
            'no_telp' => '891273891273',
            'alamat' => 'Jl Kenangan',


        ]);
    }
}
