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
                'id_username_official'=>'OFF1',
                'nama_official'=>'Official 1',
                'id_kontingen'=>'MA Bontorita',
                'pembayaran'=>0
            ],
            [
                'id_username_official'=>'OFF1',
                'nama_official'=>'Official 2',
                'id_kontingen'=>'MTs Bontoreya',
                'pembayaran'=>0
            ]
            ];

            foreach ($invoice as $key => $value) {
                Invoice::create($value);
            }
    }
}
