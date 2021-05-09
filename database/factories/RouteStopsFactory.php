<?php

namespace Database\Factories;

use App\Models\RouteStops;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteStopsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RouteStops::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $rndnmber = $this->faker->numberBetween(1 , 10);
        return [
            'stop_order' => $rndnmber,
            'stop_point' => $rndnmber,
            'route_id' => $this->faker->numberBetween(1 , 5)
        ];
    }
}
