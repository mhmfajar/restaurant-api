<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
