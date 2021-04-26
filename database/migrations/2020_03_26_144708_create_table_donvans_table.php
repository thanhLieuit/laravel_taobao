<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDonvansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donvans', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('donhang_id')->unsigned();
            $table->integer('nhavanchuyen_id')->unsigned();
            $table->string('madonvan');
            $table->string('note');
            $table->string('status');
            $table->foreign('donhang_id')->references('id')->on('donhangs')->onDelete('cascade');
            $table->foreign('nhavanchuyen_id')->references('id')->on('nhavanchuyens')->onDelete('cascade');
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
        Schema::dropIfExists('donvans');
    }
}
