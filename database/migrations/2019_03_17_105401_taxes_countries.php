<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaxesCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes_countries', function (Blueprint $table) {
            $table->integer('taxes_id')->unsigned();
            $table->foreign('taxes_id')->references('id')->on('taxes');
            $table->integer('countries_id')->unsigned();
            $table->foreign('countries_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxes_countries');

    }
}
