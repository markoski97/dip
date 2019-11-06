<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOstanatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ostanatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('proizvodi_id')->nullable();
            $table->timestamps();
            $table->string('title');
            $table->string('image');
            $table->text('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ostanatos');
    }
}
