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
            ]
        ];

        foreach($users as $key => $value){
            User::create($value);
        }
    }
}
