<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNhavanchuyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhavanchuyens', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('manhavanchuyen');
            $table->string('tennhavanchuyen');
            $table->string('email');
            $table->string('phone');
            $table->string('diachi');
            $table->string('status');
            $table->integer('admin_id')->unsigned();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhavanchuyens');
    }
}
