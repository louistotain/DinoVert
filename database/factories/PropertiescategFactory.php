<?php

namespace Database\Factories;

use App\Models\Propertiescateg;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertiescategFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Propertiescateg::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(),
            'slug' => $this->faker->slug,
        ];
    }
}
