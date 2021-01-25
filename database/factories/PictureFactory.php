<?php

namespace Database\Factories;

use App\Models\Picture;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PictureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Picture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->imageUrl(),
            'properties_id' => Property::all()->random()->id,
        ];
    }
}
