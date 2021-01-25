<?php

namespace Database\Seeders;

use App\Models\Picture;
use App\Models\Property;
use App\Models\Propertiescateg;
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
        User::factory(1)->create();
        Propertiescateg::factory(3)->create();
        Property::factory(4)->create();
        Picture::factory(10)->create();
    }
}
