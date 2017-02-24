<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city_id');
            $table->string('description');
            $table->string('description_ru');
            $table->string('ref');
            $table->string('delivery1');
            $table->string('delivery2');
            $table->string('delivery3');
            $table->string('delivery4');
            $table->string('delivery5');
            $table->string('delivery6');
            $table->integer('delivery7');
            $table->string('area');
            $table->string('prevent_entry_new_streets_user')->nullable();
            $table->string('conglomerates')->nullable();
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
        Schema::dropIfExists('api_locations');
    }
}
