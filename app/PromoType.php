<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoType extends Model
{
    public function promos(){
        return $this->hasMany('App\Promo');
    }
}
