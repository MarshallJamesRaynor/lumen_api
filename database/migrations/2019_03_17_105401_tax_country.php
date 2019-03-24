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
 * TaxCountry
 *
 * Migrations class used for database  versioning control. Allowing you to easily modify and share the application's database schema.
 *
 * @package     lamiassignment
 * @category    Migration
 * @author      Paolo Combi
 */
class TaxCountry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_country', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tax_id')->unsigned();
            $table->foreign('tax_id')->references('id')->on('taxes');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_country');

    }
}
