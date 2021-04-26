<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNaptiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naptiens', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('donhang_id')->unsigned();
            $table->integer('congtien_id')->unsigned();
            $table->integer('tiencoc');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('donhang_id')->references('id')->on('donhangs')->onDelete('cascade');
            $table->foreign('congtien_id')->references('id')->on('congtiens')->onDelete('cascade');
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
        Schema::dropIfExists('naptiens');
    }
}
