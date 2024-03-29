<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin Kejurnas',
                'username' => 'admin',
                'no_wa' => '08123456789',
                'password' => 'admin',
                'level' => 'admin-kejurnas'
            ], [
                'name' => 'Gowa',
                'username' => 'off1',
                'no_wa' => '8123456789',
                'password' => '123',
                'level' => 'official'
            ], [
                'name' => 'Makassar',
                'username' => 'off2',
                'no_wa' => '08123456789',
                'password' => '123',
                'level' => 'official'
            ], [
                'name' => 'Takalar',
                'username' => 'off3',
                'no_wa' => '08123456789',
                'password' => '123',
                'level' => 'official'
            ]
        ];

        foreach($users as $key => $value){
            User::create($value);
        }
    }
}
