<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $data[$i]['name'] = 'Meja ' . $i;
            $data[$i]['guest_number'] = 4;
            $data[$i]['status'] = 'available';
        }

        \App\Models\Table::factory()->createMany(
            $data
        );
    }
}
