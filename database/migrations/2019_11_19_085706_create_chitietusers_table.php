<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietusers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userss_id')->unsigned();
            $table->string('hoten');
            $table->string('gioitinh');
            $table->string('ngaysinh');
            $table->string('facebook');
            $table->string('sodienthoai');
            $table->string('diachi');
            $table->string('thanhpho');
            $table->foreign('userss_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('chitietusers');
    }
}
