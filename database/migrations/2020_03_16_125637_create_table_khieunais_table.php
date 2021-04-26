<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKhieunaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khieunais', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('donhang_id')->unsigned();
            $table->string('image');
            $table->string('lydo');
            $table->string('note');
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
        Schema::dropIfExists('khieunais');
    }
}
