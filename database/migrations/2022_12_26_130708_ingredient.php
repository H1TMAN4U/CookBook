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
        Schema::create('ingredient', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        $date=Carbon::now();
        DB::table('ingredient')->insert(
            array(
                ['name' => 'olive oil','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'onion','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'garlic cloves','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'chorizo','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'tomatoes','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'caster sugar','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'fresh gnocchi','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'mozzarella ball','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'bunch of basil','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'green salad','created_at'=>$date,'updated_at'=>$date],

                ['name' => 'self-raising flour','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'baking powder','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'golden caster sugar','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'large eggs','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'melted butter','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'milk','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'vegetable oil','created_at'=>$date,'updated_at'=>$date],

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
        Schema::dropIfExists('ingredient');
    }
    
};
