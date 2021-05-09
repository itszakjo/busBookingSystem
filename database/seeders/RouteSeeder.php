<?php

namespace Database\Seeders;

use App\Models\Stations;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Routes::factory(5)->create();


    }
}
