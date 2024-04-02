<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyInvoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $invoice = [
            [
                'id_username_official'=>'RWK-402012634',
                'nama_official'=>'Hamzah',
                'id_kontingen'=>'MA Bontorita',
                'pembayaran'=>0
            ],
            [
                'id_username_official'=>'RWK-402024220',
                'nama_official'=>'Anca',
                'id_kontingen'=>'MTs Bontoreya',
                'pembayaran'=>0
            ],
            [
                'id_username_official'=>'RWK-402032727',
                'nama_official'=>'Kono',
                'id_kontingen'=>'SMK 1 Galesong',
                'pembayaran'=>0
            ]
            ];

            foreach ($invoice as $key => $value) {
                Invoice::create($value);
            }
    }
}
