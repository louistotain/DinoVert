<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Articlescateg;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $phrase = $this->faker->sentence(1);

        return [
            'title' => $phrase,
            'description' => $this->faker->text(),
            'slug' => Str::slug($phrase),
            'url_picture' => $this->faker->imageUrl(),
            'articlescategs_id' => Articlescateg::all()->random()->id,
        ];
    }
}
