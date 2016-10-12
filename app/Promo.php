<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promo extends Model
{
    protected $fillable = ['video_id', 'promo_type_id', 'path', 'first_air', 'final_air'];

    public function promoType(){
        return $this->belongsTo('App\PromoType');
    }

    public function video(){
        return $this->belongsTo('App\Video');
    }
}