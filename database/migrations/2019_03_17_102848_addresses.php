<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('countries_id')->unsigned();
            $table->foreign('countries_id')->references('id')->on('countries');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('address_1',254);
            $table->string('address_2',254);
            $table->string('postcode',18);
            $table->string('city',90);
            $table->string('phone',15);
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('addresses');

    }
}
