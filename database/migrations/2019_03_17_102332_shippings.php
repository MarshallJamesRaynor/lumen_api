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
 * Shippings
 *
 * Migrations class used for database  versioning control. Allowing you to easily modify and share the application's database schema.
 *
 * @package     lamiassignment
 * @category    Migration
 * @author      Paolo Combi
 */
class Shippings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('method',50);
            $table->decimal('charge',10,2);
            $table->integer('track_number');
            $table->dateTime('ship_date');
            $table->dateTime('delivery_date');
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
        Schema::dropIfExists('shippings');
    }
}
