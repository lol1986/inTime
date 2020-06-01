<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistryeventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registryevents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('timeregistry_id')->unsigned();
            $table->dateTime('date');
            $table->enum('type',['in','out','pin','pout']);
            $table->timestamps();
            $table->string('active');
            $table->foreign('timeregistry_id')->references('id')->on('timeregistries');
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
        Schema::dropIfExists('registryevents');
    }
}
