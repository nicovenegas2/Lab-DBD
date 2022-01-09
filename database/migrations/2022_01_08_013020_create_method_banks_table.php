<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMethodBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('method_banks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bank')->nullable();
            $table->foreign('id_bank')->references('id')->on('banks');
            $table->bigInteger('id_method')->nullable();
            $table->foreign('id_method')->references('id')->on('payment_methods');
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
        Schema::dropIfExists('method_banks');
    }
}
