<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostaOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posta_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city_poster');
            $table->string('type-of-services');
            $table->string('departyre-type');
            $table->string('phone_recipient');
            $table->string('phone_poster');
            $table->string('name_recipient');
            $table->string('name_poster');
            $table->string('sender');
            $table->string('recipient');
            $table->string('product-type');
            $table->integer('product-count');
            $table->string('email_poster')->nullable();
            $table->string('email_recipient')->nullable();
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
        Schema::dropIfExists('posta_orders');
    }
}

