<?php

namespace Database\Seeders;

use App\Models\Seni;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummySenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senis = [
            [
                'kategori_seni' => 'Tunggal Tangan Kosong'
            ],
            [
                'kategori_seni' => 'Tunggal Bersenjata'
            ],
            [
                'kategori_seni' => 'Ganda Tangan Kosong'
            ],
            [
                'kategori_seni' => 'Ganda Bersenjata'
            ],
            [
                'kategori_seni' => 'Ganda Tangan Kosong Bersenjata'
            ],
            [
                'kategori_seni' => 'Trio'
            ],
        ];

        foreach($senis as $key => $val){
            Seni::create($val);
        }
    }
}
