<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function getLengthAttribute($length){
        $format = ($length >= 3600 ? "H:" : "") . "i:s";
        return gmdate($format, $length);
    }


    public function scopeGeneric($query){
        $category = Category::where('title', 'Generic')->first();
        return $query->where('category_id', $category->id);
    }

    public function duration(){
        $format = ($this->attributes['length'] >= 3600 ? "H:" : "") . "i:s";
        return gmdate($format, $this->attributes['length']) . "." . $this->attributes['frames'];
    }
}
