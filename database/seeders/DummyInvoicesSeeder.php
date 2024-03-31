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
                'id_username_official'=>'off1',
                'nama_official'=>'Gowa',
                'pembayaran'=>0
            ],
            [
                'id_username_official'=>'off2',
                'nama_official'=>'Makassar',
                'pembayaran'=>0
            ],
            [
                'id_username_official'=>'off3',
                'nama_official'=>'Takalar',
                'pembayaran'=>0
            ]
            ];

            foreach ($invoice as $key => $value) {
                Invoice::create($value);
            }
    }
}
