<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleadminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_admins', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('Admin_id')->unsigned();
            $table->integer('Role_id')->unsigned();
            $table->foreign('Role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('Admin_id')->references('id')->on('admins')->onDelete('cascade');


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
        Schema::dropIfExists('roleuser');
    }
}
