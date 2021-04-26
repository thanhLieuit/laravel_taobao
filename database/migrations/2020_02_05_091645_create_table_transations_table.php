<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transations', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('donhang_id')->unsigned();
            $table->integer('pay_id')->unsigned();
            $table->string('masogiaodich');
            $table->string('token');
            $table->string('discount');
            $table->integer('sum');
            $table->string('status');
            $table->foreign('donhang_id')->references('id')->on('donhangs')->onDelete('cascade');
            $table->foreign('pay_id')->references('id')->on('paymethods')->onDelete('cascade');
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
        Schema::dropIfExists('transations');
    }
}
