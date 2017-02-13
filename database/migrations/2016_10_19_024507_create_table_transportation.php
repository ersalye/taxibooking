<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransportation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportations', function (Blueprint $table) {
            $table->increments('id')->unsigned();;
            $table->string("name")->default(null);
            $table->string("slug")->default(null);
            $table->tinyInteger('status')->default(1);
            $table->string("description")->default(null);
            $table->double("fare_per_hour")->default(0);
            $table->double("fare_per_km")->default(0);
            $table->double("waiting_change")->default(0);
            $table->string("currency_type")->default("R");
            $table->softDeletes();
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
        Schema::drop('transportations');
    }
}
