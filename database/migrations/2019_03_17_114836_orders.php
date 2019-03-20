<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('shippings_id')->unsigned()->nullable();
            $table->foreign('shippings_id')->references('id')->on('shippings');
            $table->integer('payments_id')->unsigned()->nullable();
            $table->foreign('payments_id')->references('id')->on('payments');
            $table->integer('currencies_id')->unsigned()->nullable();
            $table->foreign('currencies_id')->references('id')->on('currencies');
            $table->decimal('total_products',10,2)->nullable();
            $table->decimal('total_discount',10,2)->nullable();
            $table->decimal('total_shipping',10,2)->nullable();
            $table->decimal('total_paid',10,2)->nullable();
            $table->decimal('total_paid_tax',10,2)->nullable();
            $table->integer('invoices_number')->nullable();
            $table->string('invoices_types')->nullable();
            $table->dateTime('invoices_data')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
