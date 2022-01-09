<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_kinds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kind')->nullable();
            $table->foreign('id_kind')->references('id')->on('kindss');
            $table->unsignedBigInteger('id_game')->nullable();
            $table->foreign('id_game')->references('id')->on('games');
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
        Schema::dropIfExists('game_kinds');
    }
}
