<?php
/**
 * Name:  CustomerBenefit
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
namespace App\Library;
use Illuminate\Database\Eloquent\Model;

/**
 * CustomerBenefit
 *
 * class used to store possible discount for the customers
 *
 * @package     lamiassignment
 * @category    Model
 * @author      Paolo Combi
 */
class CustomerBenefit extends PriceAdjuster
{
    /**
     * discount value
     *
     * @var float
     */
    protected $discount;

    public function __construct($discount){
        if ($discount > 100) throw new Exception("cannot have a discount over 100%");
        $this->discount = $discount;
    }


    /**
     * discount
     *
     * function use to give back the discount
     * @return  discount
     */
    public function discount()
    {
        return $this->discount;
    }
}
