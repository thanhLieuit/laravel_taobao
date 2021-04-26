<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableThongtinkhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongtinkhs', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('admin_id')->unsigned();
            $table->integer('nhomkh_id')->unsigned();
            $table->string('hoten');
            $table->string('diachi');
            $table->string('thanhpho');
            $table->string('email');
            $table->integer('sdt');
            $table->string('gioitinh');
            $table->string('ngaysinh');
            $table->string('facebook');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('nhomkh_id')->references('id')->on('nhomkhs')->onDelete('cascade');
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
        Schema::dropIfExists('thongtinkhs');
    }
}
