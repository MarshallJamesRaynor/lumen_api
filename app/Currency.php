<?php
/**
 * Name:  Currency
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: class used to store possibile discount for the customers
 *
 * Requirements: PHP5 or above
 * @package   lamiassignment
 * @author    Paolo Combi
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @since     Version 1.0.0
 * @filesource
 *
 *
 */
namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Currency
 *
 * class used to store possible discount for the customers
 *
 * @package     lamiassignment
 * @category    Model
 * @author      Paolo Combi
 */

class Currency extends Model{

    /**
     * countries
     *
     * is a function that find a data using one-to-many relationships.Eloquent will automatically determine the proper foreign key column on the Country model.
     * @return  App\Country[]
     */
    public function countries()
    {
        return $this->hasMany('App\Country');
    }
}
