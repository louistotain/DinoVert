<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\Propertiescateg;
use Illuminate\Database\Eloquent\Factories\Factory;

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
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->numberBetween($min = 100000, $max = 1000000),
            'location' => $this->faker->streetAddress,
            'm²' => $this->faker->numberBetween($min = 50, $max = 1500),
            'pieces' => $this->faker->numberBetween($min = 1, $max = 10),
            'state' => $this->faker->randomElement(['Neuf','Rénovation','Occasion']),
            'year_construction' => $this->faker->year(),
            'description' => $this->faker->text(),
            'propertiescategs_id' => Propertiescateg::all()->random()->id,
        ];
    }
}
