<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersholidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersholidays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user')->unsigned();
            $table->date('start');
            $table->date('end');
            $table->integer('days');
            $table->enum('status', ['pending', 'approved','denied']);
            $table->timestamps();
            $table->foreign('user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('usersholidays');
    }
}
