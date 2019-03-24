<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersState extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_state', function (Blueprint $table) {
            $table->integer('order_id')->unsigned()->primary();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->string('custom_email',254);
            $table->boolean('send_email')->default(false);
            $table->string('invoices_types')->nullable();
            $table->boolean('send_invoice')->default(false);
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
        Schema::dropIfExists('orders_state');

    }
}
