<?php

namespace Database\Seeders;

use App\Models\Kontingen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyKontingensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kontinges = [
            [
                'nama_kontingen' => 'MA Bontorita',
                'alamat' => 'Bontorita',
                'id_username_official' => 'rwk-402012634'
            ], 
            [
                'nama_kontingen' => 'MTs Bontoreya',
                'alamat' => 'Bontoreya',
                'id_username_official' => 'rwk-402024220'
            ],
            [
                'nama_kontingen' => 'SMK 1 Galesong',
                'alamat' => 'Burane',
                'id_username_official' => 'rwk-402032727'
            ]
        ];

        foreach ($kontinges as $key => $value) {
            Kontingen::create($value);
        }
    }
}
