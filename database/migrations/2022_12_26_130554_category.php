<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        $date=Carbon::now();
        DB::table('category')->insert(
            array(
                ['name' => 'food','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'drink','created_at'=>$date,'updated_at'=>$date]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
};
