<?php
/**
 * Name:  Order
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
 * Order
 *
 * Model class used to interact with that table
 *
 * @package     lamiassignment
 * @category    Model
 * @author      Paolo Combi
 */


class Order extends Model{
    use Traits\UuidTraits;

    /**
     * orderItems
     *
     * is a function that find a data using one-to-many relationships.Eloquent will automatically determine the proper foreign key column on the OrderItem model.
     * @return  App\OrderItem[]
     */
    public function orderItems(){
        return $this->hasMany(
            'App\OrderItem','order_id','id'
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid','user_id'
    ];

    /**
     * total
     *
     * function use to give back the total paid
     * @return  decimal total
     */
    public function total(){
        return $this->total_products  + $this->total_paid_tax - $this->total_discount;
    }
}
