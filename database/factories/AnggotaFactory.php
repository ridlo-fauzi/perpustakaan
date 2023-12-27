<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_anggota' => Str::random(10),
            'nama' => fake()->nama(),
            'email' => fake()->email(),
            'notelp' => fake()->notelp(),
            'jenis_kelamin' => fake()->jenis_kelamin(),
            'alamat' => fake()->alamat(),
        ];
    }
}
