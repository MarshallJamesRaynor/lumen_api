<?php
namespace App;

class CustomerBenefit extends PriceAdjuster
{
    protected $discount;
    public function __construct($discount){
        if ($discount > 100) throw new Exception("cannot have a discount over 100%");
        $this->discount = $discount;
    }
    public function discount()
    {
        return $this->discount;
    }
}
