<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_vouchers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_voucher')->nullable();
            $table->foreign('id_voucher')->references('id')->on('voucher');
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
        Schema::dropIfExists('content_vouchers');
    }
}
