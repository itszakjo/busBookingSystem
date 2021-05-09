<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Routes;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Trips::factory(5)->create();

    }
}
