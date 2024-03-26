<?php

namespace Database\Seeders;

use App\Models\KelasTanding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyKelasTandingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelasTandings = [
            [
                'nama_kelas' => 'A'
            ],
            [
                'nama_kelas' => 'B'
            ],
            [
                'nama_kelas' => 'C'
            ],
            [
                'nama_kelas' => 'D'
            ],
            [
                'nama_kelas' => 'E'
            ],
            [
                'nama_kelas' => 'F'
            ],
            [
                'nama_kelas' => 'G'
            ],
            [
                'nama_kelas' => 'H'
            ],
            [
                'nama_kelas' => 'I'
            ],
            [
                'nama_kelas' => 'J'
            ],
            [
                'nama_kelas' => 'K'
            ],
            [
                'nama_kelas' => 'L'
            ],
            [
                'nama_kelas' => 'M'
            ]
        ];

        foreach ($kelasTandings as $key => $value) {
            KelasTanding::create($value);
        };
    }
}
