<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKhoiluongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoiluongs', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('donhang_id')->unsigned();
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
            $table->integer('weight_qd');
            $table->integer('weight_tt');
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
        Schema::dropIfExists('khoiluongs');
    }
}
