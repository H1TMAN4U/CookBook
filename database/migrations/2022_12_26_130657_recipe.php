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
        Schema::create('recipe', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->longText("description");
            $table->longText("instructions");
            $table->string("img");
            
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('users_id');

            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('recipe');
    }
};
