<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeregistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeregistries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user')->unsigned();
            $table->date('date');
            $table->enum('type',['in','out','pin','pout']);
            $table->timestamps();
            $table->string('active');
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
        Schema::dropIfExists('timeregistries');
    }
}
