<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    public function countries()
    {
        return $this->belongsToMany( 'App\Country', 'tax_country', 'tax_id', 'country_id' );
    }

}
