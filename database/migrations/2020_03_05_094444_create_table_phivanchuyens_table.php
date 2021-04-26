<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhivanchuyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phivanchuyens', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('donhang_id')->unsigned();
            $table->integer('phinoidia');
            $table->integer('phivc');
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
        Schema::dropIfExists('phivanchuyens');
    }
}
