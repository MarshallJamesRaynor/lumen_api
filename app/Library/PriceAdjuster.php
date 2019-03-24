<?php
/**
 * Name:  CustomerBenefit
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: class contain a price logic
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
use Auth;
use App\Product;

use App\Order;
use App\OrderItem;
use Webpatser\Uuid\Uuid;

use Illuminate\Support\Collection;
/**
 * CustomerBenefit
 *
 * class used to manage price calculation
 *
 * @package     lamiassignment
 * @category    Model
 * @author      Paolo Combi
 */

class PriceAdjuster
{
    protected $cid = 1;

    public function __construct(){
        $this->order =  Order::create(['uuid'=>(string) Uuid::generate(), 'user_id'=> Auth::user()->id]);
        $this->item = new Collection;
        $this->customerBenefits = new Collection;
    }

    /**
     * adjustPrices
     *
     * function used to calculates the costs/discounts/taxes of the various products
     **/
    public function adjustPrices(){
        $customerDiscount = $this->getCustomerDiscount();
        $this->order->total_products = 0;
        $this->order->total_discount = 0;
        $this->order->total_paid_tax = 0;

        foreach ($this->item as $item) {
            $oldPrice = $item->price();
            $newPrice = round($item->price*$item->quantity ,2);
            if ($oldPrice !== $newPrice){
                $item->modifyPrice($newPrice);
            }
            $item->taxes_price = round($item->price() * ($item->taxes->rate / 100 ),2);
            $item->discounted_price = round($item->price() * ( $customerDiscount / 100), 2);
            $this->order->total_products += $item->price();
            $this->order->total_discount += $item->discounted_price;
            $this->order->total_paid_tax += $item->taxes_price;
        }
    }

    /**
     * getCustomerDiscount
     *
     * function return total discount for the user
     *
     **/
    protected function getCustomerDiscount()
    {
        /// tally up all the customer discounts
        $customerDiscount = min(100, $this->customerBenefits->reduce(function($value, $benefit)
        {
            $discount = $benefit ? $benefit->discount() : 0;
            return $value + $discount;
        }));

        return $customerDiscount;
    }

    /**
     * addProduct
     *
     * function use to add a Product
     * @param  Product  $product
     * @param  int      $quantity
     * @param  int    $taxId
     **/
    protected function addProduct(Product $product,$quantity,$taxId)
    {
        $orderItem = new OrderItem();
        $orderItem->product_id =$product->id;
        $orderItem->tax_id=$taxId;
        $orderItem->quantity=$quantity;
        $orderItem->price=$product->price;
        $this->addToCollection($this->item, $orderItem);
    }


    /**
     * removeProduct
     *
     * function use to remove a Product
     * @param  Product  $product
     **/
    protected function removeProduct(Product $product)
    {
        unset($this->appliedCoupons[$product->cid]);
        $this->removeFromCollection($this->products, $product);
    }
    /**
     * addCustomerBenefit
     *
     * function use to add a CustomerBenefit
     * @param  CustomerBenefit  $benefit
     **/
    protected function addCustomerBenefit(CustomerBenefit $benefit)
    {
        $this->addToCollection($this->customerBenefits, $benefit);
    }
    /**
     * removeCustomerBenefit
     *
     * function use to remove a CustomerBenefit
     * @param  CustomerBenefit  $benefit
     **/
    protected function removeCustomerBenefit(CustomerBenefit $benefit)
    {
        $this->removeFromCollection($this->customerBenefits, $benefit);
    }

    /**
     * addToCollection
     *
     * function use add an object to a specific collection and then recalculate the price
     **/
    protected function addToCollection($collection, $object)
    {
        $collection->push($object);
        $this->adjustPrices();
    }

    /**
     * addToCollection
     *
     * function use remove an object to a specific collection and then recalculate the price
     **/
    protected function removeFromCollection($collection, $object)
    {
        $key = $collection->search($object);
        $collection->forget($key);
        $this->adjustPrices();
    }


}
