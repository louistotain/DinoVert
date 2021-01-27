<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Articlescateg;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->text(),
            'slug' => $this->faker->slug,
            'url_picture' => $this->faker->imageUrl(),
            'articlescategs_id' => Articlescateg::all()->random()->id,
        ];
    }
}
