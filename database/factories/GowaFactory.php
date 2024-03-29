<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GowaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_atlet' => $this->faker->name(),
            'tempat_lahir' => $this->faker->address(),
            'tgl_lahir' => $this->faker->date(),
            'jk' => $this->faker->randomElement(['PA', 'PI']),
            'id_username_official' => 'off1',
            'golongan' => $this->faker->randomElement(['Pra Usia Dini', 'Usia Dini', 'Pra Remaja', 'Remaja', 'Dewasa', 'Master']),
            'kontingen' => 'Gowa',
            'berat_badan' => 27,
            'kelas_tanding' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M']),
            'seni' => $this->faker->randomElement(['Tunggal Tangan Kosong', 'Tunggal Bersenjata', 'Ganda Tangan Kosong', 'Ganda Bersenjata', 'Ganda Tangan Kosong dan Bersenjata', 'Trio']),
            'foto_atlet' => $this->faker->name(),
            'akte' => 'berkas-akte',
            'rekomendasi' => 'berkas-rekomendasi',
            'izin_orangtua' => 'berkas-izin',
            'suket_sehat' => 'berkas-suket sehat'
        ];
    }
}
