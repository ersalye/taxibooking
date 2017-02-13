<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string("app_id")->unsined();
            $table->string('name');
            $table->string('username_slug', 40)->nullable()->unique();
            $table->tinyInteger("approved")->default(true);
            $table->string("gender")->default(null);
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('confirmation_code');
            $table->boolean('confirmed')->default(config('access.users.confirm_email') ? false : true);
            $table->integer('facebook_id')->nullable();
            $table->string('about', 500)->nullable();
            $table->string('facebookurl', 250)->nullable();
            $table->string('twitterurl', 250)->nullable();
            $table->string('weburl', 250)->nullable();
            $table->rememberToken();
            $table->string("available")->nullable();


            // taxi

            $table->string("mobile")->default(null);
            $table->string("name_on_card")->default(null);
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();
            $table->string("cab_type")->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');
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
        Schema::drop('users');
    }
}
