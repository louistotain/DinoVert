<?php

namespace Database\Factories;

use App\Models\Propertiescateg;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $categ = $this->faker->randomElement(['Maison individuelle','Appartement','Enclos à dinosaure']);

        return [
            'name' => $categ,
            'slug' => Str::slug($categ),
        ];
    }
}
