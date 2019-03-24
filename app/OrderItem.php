<?php
/**
 * Name:  OrderItem
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description:  The Eloquent ORM included with Laravel provides a beautiful,
 *      simple ActiveRecord implementation for working with your database.
 *      Each database table has a corresponding "Model" which is used to interact with that table.
 *      Models allow you to query for data in your tables, as well as insert new records into the table.
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
 * OrderItem
 *
 * Model class used to interact with that table
 *
 * @package     lamiassignment
 * @category    Model
 * @author      Paolo Combi
 */
class OrderItem extends Model{

    /**
     * The temporary price used during the calculation.
     *
     * @var float
     */
    protected $modifiedPrice;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id','product_id','tax_id','quantity','price','discounted_price','taxes_price'
    ];


    /**
     * taxes
     *
     * is a function that find a data using one-to-many relationships.Eloquent will automatically determine the proper foreign key column on the Tax model.
     * @return  App\Tax[]
     */
    public function taxes(){
        return $this->belongsTo('App\Tax','tax_id','id');
    }


    /**
     * taxes
     *
     * is a function that find a data using one-to-many relationships.Eloquent will automatically determine the proper foreign key column on the Product model.
     * @return  App\Product[]
     */

    public function products(){
        return $this->belongsTo('App\Product','product_id','id');
    }


    /**
     * price
     *
     * function use to give back the temporary price
     * @return  decimal  modifiedPrice
     */
    public function price(){
        return $this->modifiedPrice;
    }


    /**
     * modifyPrice
     *
     * function use to set the new value of temporary price
     * @param   decimal  $price
     */
    public function modifyPrice($price){
        $this->modifiedPrice = $price;
    }

    /**
     * total
     *
     * function use to give back the total paid
     * @return  decimal total
     */
    public function total(){
        return $this->price  + $this->taxes_price - $this->discounted_price;
    }


}
