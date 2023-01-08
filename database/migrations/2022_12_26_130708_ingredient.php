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
                ['name' => 'Olive oil','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Onion','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Garlic cloves','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Chorizo','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Tomatoes','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Caster sugar','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Fresh gnocchi','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Mozzarella ball','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Basil','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Green salad','created_at'=>$date,'updated_at'=>$date],

                ['name' => 'Self-raising flour','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Baking powder','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Golden caster sugar','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Large eggs','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Melted butter','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Milk','created_at'=>$date,'updated_at'=>$date],
                ['name' => 'Vegetable oil','created_at'=>$date,'updated_at'=>$date],

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
