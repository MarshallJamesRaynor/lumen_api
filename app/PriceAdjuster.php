<?php
namespace App;
use App\OrderItem;

use Illuminate\Support\Collection;

class PriceAdjuster
{
    protected $cid = 1;
    public function __construct()
    {
        $this->order =  Order::create(['uuid'=>(string) Uuid::generate(), 'user_id'=> Auth::user()->id]);
        $this->item = new Collection;
        $this->customerBenefits = new Collection;
    }

    public function adjustPrices()
    {
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

        }
    }



    protected function addProduct(Product $product,$quantity)
    {
        $orderItem = new OrderItem();
        $orderItem->product_id =$product->id;
        $orderItem->tax_id=1;
        $orderItem->quantity=$quantity;
        $orderItem->price=$product->price;
        $this->addToCollection($this->item, $orderItem);
    }

    protected function removeProduct(Product $product)
    {
        unset($this->appliedCoupons[$product->cid]);
        $this->removeFromCollection($this->products, $product);
    }

    protected function addCustomerBenefit(CustomerBenefit $benefit)
    {
        $this->addToCollection($this->customerBenefits, $benefit);
    }

    protected function removeCustomerBenefit(CustomerBenefit $benefit)
    {
        $this->removeFromCollection($this->customerBenefits, $benefit);
    }

    protected function addToCollection($collection, $object)
    {
        $collection->push($object);
        $this->adjustPrices();
    }
    protected function removeFromCollection($collection, $object)
    {
        $key = $collection->search($object);
        $collection->forget($key);
        $this->adjustPrices();
    }


    protected function getCustomerDiscount()
    {
        /// tally up all the customer discounts
        $customerDiscount = min(100, $this->customerBenefits->reduce(function($value, $benefit)
        {
            $discount = $benefit ? $benefit->discount() : 0;
            return $value + $discount;
        })

        );
        return $customerDiscount;
    }

}
