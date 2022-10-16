<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Role::factory('roles')->createMany([
            ['name' => 'Kasir'],
            ['name' => 'Pelayan']
        ]);

        \App\Models\User::factory()->createMany([
            [
                'name' => 'Kasir 1',
                'email' => 'kasir1@example.com',
                'role_id' => 1
            ],
            [
                'name' => 'Pelayan 1',
                'email' => 'pelayan1@example.com',
                'role_id' => 2
            ]
        ]);
    }
}
