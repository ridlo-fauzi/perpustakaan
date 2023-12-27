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
        User::create([
            'id_user' => '000',
            'name' => 'Ryan Firmansyah',
            'email'=> 'ryan.firmansyah.7.8.0@gmail.com',
            'password' => Hash::make('password'),
            'no_hp' => '089664261574',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Sukoharjo',
            'role' => 'admin',
        ]);
    }
}
