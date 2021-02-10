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
use Illuminate\Support\Str;

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

        DB::table('propertiescategs')->insert([
            'name' => 'Appartement',
            'slug' => Str::slug('Appartement')
        ]);

        DB::table('propertiescategs')->insert([
            'name' => 'Maison individuelle',
            'slug' => Str::slug('Maison individuelle')
        ]);
        DB::table('propertiescategs')->insert([
            'name' => 'Enclos à dinosaure',
            'slug' => Str::slug('Enclos à dinosaure')
        ]);

        Article::factory(20)
            ->hasAttached(Tag::factory()->count(2))
            ->create();

        Property::factory(20)
            ->hasAttached(Picture::factory()->count(2))
            ->create();

        DB::table('wysiwygs')->insert([
            'name' => 'title_accueil',
            'content' => '<div class="row text-center p-4"><div class="col-12 mb-3"><h2>Maison,</h2><h2>Appartement,</h2><h2>Enclos à dinosaure</h2></div><div class="col-12" style="font-size: 17px;"><p>Trouvez tout ce dont vous avez besoin avec juste un swipe</p></div></div>'
        ]);
        DB::table('wysiwygs')->insert([
            'name' => 'under_title_accueil',
            'content' => '<div class="row text-left pt-5 pb-3 d-flex justify-content-around"><div class="col-8"><h3 style="font-family: Helvetica Now Text">Notre agence immobilière vous met le meilleurs à disposition toute l\'année.</h3 ></div ></div ><div class="row text-left pb-5 d-flex justify-content-around" ><div class="col-8" ><p > Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua . At vero eos et accusam et justo duo dolores et ea rebum . Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet . Lorem ipsum </p ></div ></div >'
        ]);

    }
}
