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

        User::create([
            'nrp'      => 'admin',
            'nama'     => 'Budiman Setiadi',
            'level'    => 'Administrasi',
            'password' => Hash::make('pass'),
        ]);

        User::create([
            'nrp'      => 'atasan',
            'nama'     => 'Setyo Novanto',
            'level'    => 'HC Section Head',
            'password' => Hash::make('pass'),
        ]);
    }
}
