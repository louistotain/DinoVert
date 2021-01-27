<?php

namespace Database\Factories;

use App\Models\Articlescateg;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlescategFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articlescateg::class;

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
