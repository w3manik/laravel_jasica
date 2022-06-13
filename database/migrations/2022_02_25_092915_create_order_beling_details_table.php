<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBelingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_beling_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->string('adress');
            $table->integer('postcode');
            $table->longText('notes');
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
        Schema::dropIfExists('order_beling_details');
    }
}
