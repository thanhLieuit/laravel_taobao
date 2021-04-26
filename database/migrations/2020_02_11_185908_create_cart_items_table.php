<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cart_id');
            $table->string('image');
            $table->string('name_product');
            $table->string('url');
            $table->string('size');
            $table->string('color');
            $table->integer('price');
            $table->integer('price_product');
            $table->integer('quantity');
            $table->string('status');
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
           // $table->primary(array('cart_id'));
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
        Schema::dropIfExists('cart_items');
    }
}
