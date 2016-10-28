<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    protected $fillable = ['title', 'length', 'frames', 'category_id', 'path', 'onair'];
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function promo(){
        return $this->hasOne('App\Promo');
    }

    public function playBlocks(){
        return $this->belongsToMany('App\Playblock');
    }

//    public function getLengthAttribute($length){
//        return $length;
//        //return Carbon::parse($length)->format('H:i:s');
//    }


    public function scopeGeneric($query){
        $category = Category::where('title', 'Generic')->first();
        return $query->where('category_id', $category->id);
    }
}
