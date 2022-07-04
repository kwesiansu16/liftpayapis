<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->integer('drivers_id')->unsigned;
            $table->integer("number_of_occupants");
            $table->decimal('ride_cost');
            $table->date('ride_date');
            $table->time('ride_time');
            $table->decimal('ride_distance');
            $table->string('start_location');
            $table->decimal('start_latitude');
            $table->decimal('start_longitude');
            
            
          
            $table->string('end_location');
            $table->decimal('end_latitude');
            $table->decimal('end_longitude');
           // $table->timestamps();
            




        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
