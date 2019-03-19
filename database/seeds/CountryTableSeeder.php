<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CountryTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        return factory(App\Country::class, 10)->create();
    }

}
