<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Articlescateg;
use App\Models\Newsletter;
use App\Models\Picture;
use App\Models\Property;
use App\Models\Propertiescateg;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        Newsletter::factory(10)->create();
        User::factory(1)->create();
        Propertiescateg::factory(3)->create();
        Property::factory(4)->create();
        Picture::factory(10)->create();

        Articlescateg::factory(3)->create();
        Article::factory(5)
            ->hasAttached(Tag::factory()->count(2))
            ->create();

    }
}
