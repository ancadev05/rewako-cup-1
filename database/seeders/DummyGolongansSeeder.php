<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyGolongansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $golongans = [
            [
                'nama_golongan' => 'Pra Usia Dini'
            ],
            [
                'nama_golongan' => 'Usia Dini'
            ],
            [
                'nama_golongan' => 'Pra Remaja'
            ],
            [
                'nama_golongan' => 'Remaja'
            ],
            [
                'nama_golongan' => 'Dewasa'
            ],
            [
                'nama_golongan' => 'Master'
            ]
        ];

        foreach ($golongans as $key => $value) {
            Golongan::create($value);
        }
    }
}
