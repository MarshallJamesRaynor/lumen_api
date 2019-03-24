<?php

/**
 * Project: Lamia OY Practical Task
 * Created: 23.03.2019
 * Description: this file is used to manage all the seeder
 * Requirements: PHP5 or above
 * @package   lamiassignment
 * @author    Paolo Combi
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @since     Version 1.0.0
 * @filesource
 */
use Illuminate\Database\Seeder;

/**
 * DatabaseSeeder
 *
 * Main class used to create a fake data in a database
 *
 * @package     lamiassignment
 * @category    Seeder
 * @author      Paolo Combi
 */


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');
        $this->call('CountryTableSeeder');
        $this->call('TaxTableSeeder');
        $this->call('AddressTableSeeder');
        $this->call('CurrencyTableSeeder');
        $this->call('MerchantTableSeeder');
        $this->call('ProductTableSeeder');

        // Tax and Country have a Many To Many relation
        $taxes =  App\Tax::all();
        App\Country::all()->each(function ($country) use ($taxes){
            $country->taxes()->attach($taxes->random(rand(1,5)));
        });


    }

}
