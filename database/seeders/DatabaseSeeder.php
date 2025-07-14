<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'Gading',
            'email' => 'gadingpamungkas776@gmail.com',
            'role' => 'TataUsaha',
            'password' => Hash::make('123123123'),

        ]);
        User::create([
            'nama' => 'Raihan',
            'email' => 'raihan@gmail.com',
            'role' => 'Siswa',
            'password' => Hash::make('123123123'),

        ]);
        User::create([
            'nama' => 'Naufal',
            'email' => 'naufal@gmail.com',
            'role' => 'Guru',
            'password' => Hash::make('123123123'),

        ]);
        User::create([
            'nama' => 'Jeri',
            'email' => 'jeri@gmail.com',
            'role' => 'WaliKelas',
            'password' => Hash::make('123123123'),

        ]);
        User::create([
            'nama' => 'Alghifari',
            'email' => 'alghifari@gmail.com',
            'role' => 'KepalaSekolah',
            'password' => Hash::make('123123123'),

        ]);
    }
}
