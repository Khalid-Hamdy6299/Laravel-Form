<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Users = [
            [
                'name' => 'Developer',
                'email' => 'dev@sunrise.com',
                'type_id' => '1',
                'password' => bcrypt('Abc$123')
            ],
            [
                'name' => 'HR',
                'email' => 'hr@sunrise.com',
                'type_id' => '2',
                'password' => bcrypt('Abc$123')
            ]
        ];

        foreach ($Users as $user) {
            User::create($user);
        }
    }
}
