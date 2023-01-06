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
        Schema::create('recipe_ingredient', function (Blueprint $table) {
            // $table->id();

            $table->unsignedBigInteger('recipe_id');
            $table->foreign('recipe_id')->references('id')->on('recipe')->onDelete('cascade'); 

            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')->references('id')->on('ingredient')->onDelete('cascade'); 

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
        Schema::dropIfExists('recipe_ingredient');
    }
};
