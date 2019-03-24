<?php
/**
 * Name:  Product
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
 * Product
 *
 * Model class used to interact with that table
 *
 * @package     lamiassignment
 * @category    Model
 * @author      Paolo Combi
 */
class Product extends Model{
    use Traits\UuidTraits;


    /**
     * orderItems
     *
     * is a function that find a data using one-to-many relationships.Eloquent will automatically determine the proper foreign key column on the Address model.
     * @return  App\OrderItem[]
     */
    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }



}
