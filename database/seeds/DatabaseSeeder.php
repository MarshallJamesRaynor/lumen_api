<?php

use Illuminate\Database\Seeder;

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

        $taxes =  App\Tax::all();

        App\Country::all()->each(function ($country) use ($taxes){
            $country->taxes()->attach(
                $taxes->random(rand(1,5))
            );
        });


    }

}
