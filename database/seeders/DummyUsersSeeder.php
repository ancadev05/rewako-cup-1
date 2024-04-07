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
                'no_wa' => '085695605182',
                'password' => 'admin;',
                'level' => 'admin-kejurnas',
                'foto_official' => 'admin.png'
            ], [
                'name' => 'Official 1',
                'username' => 'off1',
                'no_wa' => '11111',
                'password' => '123',
                'level' => 'official'
            ], [
                'name' => 'Official 2',
                'username' => 'off2',
                'no_wa' => '22222',
                'password' => '123',
                'level' => 'official'
            ]
        ];

        foreach($users as $key => $value){
            User::create($value);
        }
    }
}
