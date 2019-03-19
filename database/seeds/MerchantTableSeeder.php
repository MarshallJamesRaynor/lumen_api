<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MerchantTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        return factory(App\Merchant::class, 10)->create();
    }

}
