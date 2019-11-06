<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaminatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laminats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('proizvodi_id')->nullable();
            $table->string('title');
            $table->string('debelina');
            $table->string('boja');
            $table->string('klasanaotpornost');
            $table->string('sistemnagreejne');
            $table->string('image');

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
        Schema::dropIfExists('laminats');
    }
}
