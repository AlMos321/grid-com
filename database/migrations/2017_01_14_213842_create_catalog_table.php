<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogTable extends Migration
{
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('images');
            $table->string('price');
            $table->integer('count');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('catalogs');
    }
}
