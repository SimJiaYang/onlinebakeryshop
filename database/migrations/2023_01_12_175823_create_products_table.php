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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('flavorID');
            $table->foreign('flavorID')->references('id')->on('flavors');
            $table->longText('description');
            $table->double('price',8,2);
            $table->string('image')->default('cake');
            $table->integer('quantity');
            $table->unsignedBigInteger('categoryID');
            $table->foreign('categoryID')->references('id')->on('categories');
            $table->unsignedBigInteger('sizeID');
            $table->foreign('sizeID')->references('id')->on('sizes');
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
        Schema::dropIfExists('products');
    }
};
