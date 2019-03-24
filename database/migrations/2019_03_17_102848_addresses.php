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
 * Addresses
 *
 * Migrations class used for database  versioning control. Allowing you to easily modify and share the application's database schema.
 *
 * @package     lamiassignment
 * @category    Migration
 * @author      Paolo Combi
 */
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
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
