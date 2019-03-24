<?php
/**
 * Project: Lamia OY Practical Task
 * Created: 23.03.2019
 * Description: this file is used to manage currency seeder
 * Requirements: PHP5 or above
 * @package   lamiassignment
 * @author    Paolo Combi
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @since     Version 1.0.0
 * @filesource
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
/**
 * CurrencyTableSeeder
 *
 * Class used to create a fake data
 *
 * @package     lamiassignment
 * @category    Seeder
 * @author      Paolo Combi
 */

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
