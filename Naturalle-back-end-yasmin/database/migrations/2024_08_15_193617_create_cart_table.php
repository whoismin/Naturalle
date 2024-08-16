<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pid');
            $table->string('name', 100);
            $table->integer('price');
            $table->integer('quantity');
            $table->string('image', 100);

            // Foreign key constraints can be added here if needed
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('pid')->references('id')->on('products');

            $table->timestamps(); // Add created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
