<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['title', 'length', 'frames', 'promo_type_id', 'path', 'category_id', 'onair', 'first_air', 'final_air'];

    public function promoType(){
        return $this->belongsTo('App\PromoType');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
