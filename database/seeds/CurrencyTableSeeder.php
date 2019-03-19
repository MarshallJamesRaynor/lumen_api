<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CurrencyTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        return factory(App\Currency::class, 10)->create();
    }

}
