<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string("slug")->nullable();
            $table->tinyInteger("status")->default(1);
            $table->string("user_email")->nullable();
            $table->string("driver_email")->nullable();
            $table->string("pickup_location")->nullable();
            $table->string("dropoff_location")->nullable();
            $table->string("distance");
            $table->string("reach_time")->nullable();
            $table->string("fare_per_unit")->nullable();
            $table->string("travel_time")->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rides');
    }
}
