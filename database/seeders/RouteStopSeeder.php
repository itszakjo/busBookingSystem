<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RouteStopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\RouteStops::factory(10)->create();

    }
}
