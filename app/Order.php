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
        'uuid'
    ];
}
