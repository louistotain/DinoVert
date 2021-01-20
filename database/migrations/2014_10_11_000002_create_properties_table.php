<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            $table->string('location');
            $table->float('m²');
            $table->integer('pieces');
            $table->string('sate');
            $table->year('year_construction');
            $table->string('description');
            $table->foreignId('propertiesCategories_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
