<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Property;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realTextBetween(25,45),
            'description' => $this->faker->realTextBetween(100,150),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'address' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 0, 999999.99),
            'sqm' => rand(150,1500),
            'bedrooms' => rand(3,10),
            'bathrooms' => rand(2,5),
            'garages' => rand(1,3),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date()
        ];
    }
}
