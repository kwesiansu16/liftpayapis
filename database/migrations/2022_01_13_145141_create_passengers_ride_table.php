<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengersRideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers_ride', function (Blueprint $table) {

            $table->id();
            $table->integer('rides_id')->unsigned;
            $table->integer('passenger_id')->unsigned;
            

            $table->string('pickup_location');
            $table->string('end_location');
            $table->decimal('start_latitude');
            $table->decimal('start_longitude');
           
            $table->decimal('end_latitude');
            $table->enum('passenger_status', array('cancelled', 'picked','completed'));

            
        
            



           /* id (INCREMENTAL) 
            ride_id ->RIDES_TABLE(rides_id)
            passenger_id-> PASSENGERS TABLE(id)
            pickup_point(TYPE = POINT)
            end_point(TYPE = POINT)
            pickup_location (STRING)
            end_location (STRING)
            passenger_status (STRING) */
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passengers_ride');
    }
}
