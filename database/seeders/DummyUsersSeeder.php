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
                'password' => 'admin;',
                'level' => 'admin-kejurnas'
            ], [
                'name' => 'Hamzah',
                'username' => 'rwk-402012634',
                'no_wa' => '8123456789',
                'password' => 'rwk-402012634',
                'level' => 'official'
            ], [
                'name' => 'Anca',
                'username' => 'rwk-402024220',
                'no_wa' => '08123456789',
                'password' => 'rwk-402024220',
                'level' => 'official'
            ], [
                'name' => 'Kono',
                'username' => 'rwk-402032727',
                'no_wa' => '08123456789',
                'password' => 'rwk-402032727',
                'level' => 'official'
            ]
        ];

        foreach($users as $key => $value){
            User::create($value);
        }
    }
}
