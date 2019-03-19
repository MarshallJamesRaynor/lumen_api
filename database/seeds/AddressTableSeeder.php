<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AddressTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        return factory(App\Address::class, 10)->create();
    }

}
