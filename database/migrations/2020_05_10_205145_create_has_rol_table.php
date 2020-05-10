<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('has_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user')->unsigned();
            $table->unsignedBigInteger('role')->unsigned();
            $table->timestamps();
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('role')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('has_role');
    }
}
