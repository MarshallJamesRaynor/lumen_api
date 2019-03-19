<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function countries()
    {
        return $this->hasMany('App\Country');
    }
}
