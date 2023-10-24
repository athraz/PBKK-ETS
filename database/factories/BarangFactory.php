<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jenis_id' => mt_rand(1, 4),
            'kondisi_id' => mt_rand(1, 3),
            'keterangan' => $this->faker->sentence(mt_rand(2, 10)),
            'kecacatan' => $this->faker->paragraph(mt_rand(0, 10)),
            'jumlah' => mt_rand(1, 100),
            'gambar' => "null.jpg"
        ];
    }
}
