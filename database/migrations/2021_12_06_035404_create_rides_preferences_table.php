<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides_preferences', function (Blueprint $table) {
            $table->id();
            $table->integer('passengers_id')->unsigned;
            $table->string('start_location');
            $table->decimal('start_latitude');
            $table->decimal('start_longitude');
            $table->string('end_location');
            $table->decimal('end_latitude');
            $table->decimal('end_longitude');
            $table->integer('time_tolerance_minutes');
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
        Schema::dropIfExists('rides_preferences');
    }
}
