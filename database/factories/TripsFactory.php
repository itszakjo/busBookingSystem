<?php

namespace Database\Factories;

use App\Models\Trips;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trips::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->city . '-' . $this->faker->city,
            'bus_id' => $this->faker->numberBetween(1 , 5),
            'route_id' => $this->faker->numberBetween(1 , 5),
            'date' => $this->faker->date(),
            'departure_at' => $this->faker->time(),
            'arrival_at' => $this->faker->time(),
            'seat_price'=>50.00
        ];
    }
}
