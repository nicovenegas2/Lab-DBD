<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_countries')->nullable();
            $table->foreign('id_countries')->references('id')->on('countries');
            $table->unsignedBigInteger('id_games')->nullable();
            $table->foreign('id_games')->references('id')->on('games');
            $table->integer('price');
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
        Schema::dropIfExists('country_games');
    }
}
