<?php
/**
 * Name:  OrderState
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
 * OrderState
 *
 * Model class used to interact with that table
 *
 * @package     lamiassignment
 * @category    Model
 * @author      Paolo Combi
 */

class OrderState extends Model{

    protected $table = 'orders_state';
    protected $primaryKey = 'order_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id','custom_email','send_email','invoices_types'];


    /**
     * setSendInvoice
     *
     * set invoice status after the transaction
     * @param    boolen  $status
     * @return  void
     */
    public function  setSendInvoice($status){
        $this->send_invoice = $status;
    }
}
