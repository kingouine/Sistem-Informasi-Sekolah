<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MataPelajaran::create([
            'nama_mapel' => 'Biologi',
            'jurusan_id' => 1,


        ]);
        MataPelajaran::create([
            'nama_mapel' => 'Sejarah',
            'jurusan_id' => 2,


        ]);
    }
}
