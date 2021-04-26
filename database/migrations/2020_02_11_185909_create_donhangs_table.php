<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('thongtinkh_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->string('madonhang');
            $table->string('cart_item_id');
            $table->string('xacnhandon');
            $table->integer('totalqty');
            $table->integer('coc');
            $table->string('note');
            $table->string('status');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('thongtinkh_id')->references('id')->on('thongtinkhs')->onDelete('cascade');
            $table->foreign('cart_item_id')->references('cart_id')->on('cart_items')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('donhangs');
    }
}
