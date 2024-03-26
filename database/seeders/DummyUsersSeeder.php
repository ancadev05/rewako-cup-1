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
                'password' => bcrypt('admin'),
                'level' => 'admin-kejurnas'
            ], [
                'name' => 'Official 1',
                'username' => 'off1',
                'password' => bcrypt('123'),
                'level' => 'official'
            ], [
                'name' => 'Official 2',
                'username' => 'off2',
                'password' => bcrypt('123'),
                'level' => 'official'
            ], [
                'name' => 'Official 3',
                'username' => 'off3',
                'password' => bcrypt('123'),
                'level' => 'official'
            ]
        ];

        foreach($users as $key => $value){
            User::create($value);
        }
    }
}
