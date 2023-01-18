<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productID');
            $table->foreign('productID')->references('id')->on('products');
            $table->integer('quantity');
            $table->unsignedBigInteger('userID');
            $table->foreign('userID')->references('id')->on('users');

            $table->unsignedBigInteger('orderID')->nullable();
            $table->foreign('orderID')->references('id')->on('orders');
            
            $table->date('dateAdd');
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
        Schema::dropIfExists('carts');
    }
};
