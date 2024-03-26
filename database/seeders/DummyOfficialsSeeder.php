<?php

namespace Database\Seeders;

use App\Models\Official;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyOfficialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officials = [
            [
                'nama_official' => 'Official 1',
                'username' => 'off1',
                'password' => bcrypt('123')
            ], [
                'nama_official' => 'Official 2',
                'username' => 'off2',
                'password' => bcrypt('123')
            ], [
                'nama_official' => 'Official 3',
                'username' => 'off3',
                'password' => bcrypt('123')
            ]
        ];

        foreach ($officials as $key => $val) { 
            Official::create($val);
        }
    }
}
