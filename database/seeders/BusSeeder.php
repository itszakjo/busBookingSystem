<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Bus::factory(5)->create()->each(function ($bus){
            $seats = \App\Models\Seats::factory(12)->make();
            $bus->seats()->saveMany($seats);

        });


    }
}
