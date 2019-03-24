<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Order extends Model{
    use Traits\UuidTraits;

    public function orderItems(){
        return $this->hasMany(
            'App\OrderItem','order_id','id'
        );
    }

    protected $fillable = [
        'uuid','user_id'
    ];


    public function total(){
        return $this->total_products  + $this->total_paid_tax - $this->total_discount;
    }
}
