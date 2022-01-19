<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_paymentmethod')->nullable();
            $table->foreign('id_paymentmethod')->references('id')->on('payment_methods');
            $table->string('cardnumber');
            $table->integer('csc');
            $table->date('expiration');
            $table->string('cardowner');
            $table->string('email');

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
        Schema::dropIfExists('user_methods');
    }
}
