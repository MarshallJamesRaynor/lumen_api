<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function taxes(){
        return $this->belongsToMany(
            'App\Tax',
            'tax_country',
            'country_id',
            'tax_id'
        );

    }

    public function addresses(){
        return $this->hasMany('App\Address');
    }

    public function merchants(){
        return $this->hasMany('App\Merchant');
    }
    
    public function currencies(){
        return $this->hasMany('App\Currency');
    }
}
