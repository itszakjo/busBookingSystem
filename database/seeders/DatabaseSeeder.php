<?php

namespace Database\Seeders;

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

        $this->call([
            StationSeeder::class,
            UserSeeder::class,
            BusSeeder::class ,
            RouteSeeder::class,
            SeatSeeder::class ,
            TripSeeder::class,
            RouteStopSeeder::class,

        ]);
    }
}
