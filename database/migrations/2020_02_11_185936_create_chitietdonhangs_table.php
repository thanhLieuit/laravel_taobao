<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('donhang_id')->unsigned();
            $table->string('image');
            $table->string('name_product');
            $table->string('url');
            $table->string('size');
            $table->string('color');
            $table->integer('price');
            $table->integer('price_product');
            $table->integer('quantity');
            $table->string('status');
            $table->foreign('donhang_id')->references('id')->on('donhangs')->onDelete('cascade');
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
        Schema::dropIfExists('chitietdonhangs');
    }
}
