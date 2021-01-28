<?php

namespace Database\Factories;

use App\Models\Articlescateg;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
         $categ = $this->faker->unique()->randomElement(['Informations','Guide','Aides']);

        return [
            'name' => $categ,
            'slug' => Str::slug($categ),
        ];
    }
}
