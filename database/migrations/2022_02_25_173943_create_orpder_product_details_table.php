<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrpderProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orpder_product_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('product_quentity');
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
        Schema::dropIfExists('orpder_product_details');
    }
}
