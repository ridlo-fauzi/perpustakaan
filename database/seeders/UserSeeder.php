<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'Ridlo',
            'email' => 'ridlo@gmail.com',
            'password' => Hash::make('12345'),
            'no_hp' => '08568322475',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Karanganyar',
            'role' => 'admin',
        ]);
    }
}
