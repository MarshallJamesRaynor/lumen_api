<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use Traits\UuidTraits;

    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }



}
