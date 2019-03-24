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
 * OrdersState
 *
 * Migrations class used for database  versioning control. Allowing you to easily modify and share the application's database schema.
 *
 * @package     lamiassignment
 * @category    Migration
 * @author      Paolo Combi
 */
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
