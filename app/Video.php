<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'duration', 'frames', 'category_id', 'path', 'onair'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function promo(){
        return $this->hasOne(Promo::class);
    }

    public function playblocks(){
        return $this->belongsToMany(Playblock::class);
    }

    public function scopeGeneric($query){
        $category = Category::where('title', 'Generic')->first();
        return $query->where('category_id', $category->id);
    }

    public function formatDuration(){
        $format = ($this->attributes['duration'] >= 3600 ? "H:" : "") . "i:s";
        return gmdate($format, $this->attributes['duration']) . "." . $this->attributes['frames'];
    }
}
