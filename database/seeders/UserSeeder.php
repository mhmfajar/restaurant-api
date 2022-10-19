<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->createMany([
            [
                'role' => "kasir",
                'name' => 'Kasir 1',
                'email' => 'kasir1@example.com',
            ],
            [
                'role' => "pelayan",
                'name' => 'Pelayan 1',
                'email' => 'pelayan1@example.com',
            ]
        ]);
    }
}
