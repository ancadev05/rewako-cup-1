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
                'nama_kontingen' => 'Gowa',
                'alamat' => 'Gowa',
                'id_username_official' => 'off1'
            ], 
            [
                'nama_kontingen' => 'Makassar',
                'alamat' => 'Makassar',
                'id_username_official' => 'off2'
            ],
            [
                'nama_kontingen' => 'Takalar',
                'alamat' => 'Takalar',
                'id_username_official' => 'off3'
            ]
        ];

        foreach ($kontinges as $key => $value) {
            Kontingen::create($value);
        }
    }
}
