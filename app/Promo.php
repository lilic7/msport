<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promo extends Model
{
    protected $fillable = ['video_id', 'promo_type_id', 'first_air', 'final_air'];

    public function promoType(){
        return $this->belongsTo(PromoType::class);
    }

    public function video(){
        return $this->belongsTo(Video::class);
    }
}
