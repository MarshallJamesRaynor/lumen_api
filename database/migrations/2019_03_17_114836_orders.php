<?php
/**
 * Project: Lamia OY Practical Task
 * Created: 23.03.2019
 * Description: migration file use to create a database table
 * Requirements: PHP5 or above
 * @package   lamiassignment
 * @author    Paolo Combi
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @since     Version 1.0.0
 * @filesource
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
/**
 * Orders
 *
 * Migrations class used for database  versioning control. Allowing you to easily modify and share the application's database schema.
 *
 * @package     lamiassignment
 * @category    Migration
 * @author      Paolo Combi
 */
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
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('shipping_id')->unsigned()->nullable();
            $table->foreign('shipping_id')->references('id')->on('shippings');
            $table->integer('payment_id')->unsigned()->nullable();
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->integer('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->decimal('total_products',10,2)->nullable();
            $table->decimal('total_discount',10,2)->nullable();
            $table->decimal('total_shipping',10,2)->nullable();
            $table->decimal('total_paid',10,2)->nullable();
            $table->decimal('total_paid_tax',10,2)->nullable();
            $table->integer('invoices_number')->nullable();
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
