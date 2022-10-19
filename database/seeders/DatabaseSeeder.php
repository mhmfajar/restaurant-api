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

        \App\Models\Food::factory()->createMany([
            [
                'name' => 'Ayam Geprek',
                'type' => 'Makanan',
                'price' => '20000',
                'status' => true
            ],
            [
                'name' => 'Nasi Goreng',
                'type' => 'Makanan',
                'price' => '14000',
                'status' => true
            ],
            [
                'name' => 'Nasi Bakar',
                'type' => 'Makanan',
                'price' => '10000',
                'status' => true
            ],
            [
                'name' => 'Es Jeruk',
                'type' => 'Minuman',
                'price' => '5000',
                'status' => true
            ],
            [
                'name' => 'Teh Botol',
                'type' => 'Minuman',
                'price' => '4000',
                'status' => true
            ],
        ]);

        $this->call([
            TableSeeder::class
        ]);
    }
}
