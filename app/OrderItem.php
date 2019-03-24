<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model{

    protected $modifiedPrice;
    protected $fillable = [
        'order_id','product_id','tax_id','quantity','price','discounted_price','taxes_price'
    ];

    public function taxes()
    {
        return $this->belongsTo('App\Tax','tax_id','id');
    }

    public function products()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }
    public function price(){
        return $this->modifiedPrice;
    }

    public function modifyPrice($price){
        $this->modifiedPrice = $price;
    }

    public function total(){
        return $this->price  + $this->taxes_price - $this->discounted_price;
    }


}
