<?php

namespace Database\Factories;

use App\Models\Stations;
use Illuminate\Database\Eloquent\Factories\Factory;

class StationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stations::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city
        ];
    }
}
