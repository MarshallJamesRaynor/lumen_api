<?php
/**
 * Name:  Country
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
 * Country
 *
 * class used to store possible discount for the customers
 *
 * @package     lamiassignment
 * @category    Model
 * @author      Paolo Combi
 */
class Country extends Model{

    protected $table = 'countries';
    protected $primaryKey = 'id';


    /**
     * taxes
     *
     * is a function that find a data using many-to-many relationships.
     *
     * @return  App\Tax[]
     */

    public function taxes(){
        return $this->belongsToMany('App\Tax', 'tax_country', 'country_id', 'tax_id');

    }

    /**
     * addresses
     *
     * is a function that find a data using one-to-many relationships.Eloquent will automatically determine the proper foreign key column on the Address model.
     * @return  App\OrderItem[]
     */
    public function addresses(){
        return $this->hasMany('App\Address');
    }
    /**
     * merchants
     *
     * is a function that find a data using one-to-many relationships.Eloquent will automatically determine the proper foreign key column on the Merchant model.
     * @return  App\Merchant[]
     */
    public function merchants(){
        return $this->hasMany('App\Merchant');
    }

    /**
     * currencies
     *
     * is a function that find a data using one-to-many relationships.Eloquent will automatically determine the proper foreign key column on the Currency model.
     * @return  App\Currency[]
     */
    public function currencies(){
        return $this->hasMany('App\Currency');
    }
}
