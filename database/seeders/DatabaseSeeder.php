<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Articlescateg;
use App\Models\Newsletter;
use App\Models\Picture;
use App\Models\Propertiescateg;
use App\Models\Property;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {

        Newsletter::factory(1)->create();
        User::factory(1)->create();
        Articlescateg::factory(3)->create();
        Propertiescateg::factory(3)->create();

        Article::factory(6)
            ->hasAttached(Tag::factory()->count(2))
            ->create();

        Property::factory(6)
            ->hasAttached(Picture::factory()->count(2))
            ->create();

        DB::table('wysiwygs')->insert([
            'name' => 'title_accueil',
            'content' => '<div class="row text-center p-4"><div class="col-12"><h5>Maison,</h5><h5>Appartement,</h5><h5>Enclos à dinosaure</h5></div><div class="col-12"><p>Trouvez tout ce dont vous avez besoin avec juste un swipe</p></div></div>'
        ]);

        DB::table('wysiwygs')->insert([
            'name' => 'under_title_accueil',
            'content' => '<div class="row text-left p-3 d-flex justify-content-around"><div class="col-6"><h5>Notre agence immobilière vous met le meilleurs à disposition toute l\'année.</h5 ></div ></div ><div class="row text-left p-3 d-flex justify-content-around" ><div class="col-6" ><p > Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua . At vero eos et accusam et justo duo dolores et ea rebum . Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet . Lorem ipsum </p ></div ></div >'
        ]);

    }
}
