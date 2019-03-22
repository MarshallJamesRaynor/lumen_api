<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model{
    protected $fillable = [
        'order_id','product_id','tax_id','quantity','price','discounted_price','taxes_price'
    ];
}
