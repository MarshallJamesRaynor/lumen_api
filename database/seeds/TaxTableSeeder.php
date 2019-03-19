<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TaxTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        return factory(App\Tax::class, 10)->create();
    }

}
