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
     * @throws \Exception
     */
    public function definition()
    {
        $randomUrl = 'https://picsum.photos/'.random_int(1900,2000).'/'.random_int(1000,1100);

        return [
            'url' => $randomUrl,
            'properties_id' => Property::all()->random()->id,
        ];
    }
}
