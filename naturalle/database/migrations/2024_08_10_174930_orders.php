<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('number');
            $table->string('email');
            $table->string('method');
            $table->text('address');
            $table->text('total_products');
            $table->unsignedInteger('total_price');
            $table->dateTime('placed_on');
            $table->string('payment_status')->default('pending');
            $table->string('ong')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};