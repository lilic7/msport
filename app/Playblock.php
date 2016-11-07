<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playblock extends Model
{
    protected $fillable = ['title', 'length'];
    
    public function videos(){
        return $this->belongsToMany(Video::class)->withPivot('id');
    }

    public function playblockType(){
        return $this->belongsTo(PlayblockType::class);
    }

    function scopeType($query, $type){

        $playblock_type = PlayblockType::where('title', $type)->first();
        
        return $query->where('playblock_type_id', $playblock_type->id);
    }
    
    function addVideo($video){
        $generic_promo = Video::where('title', 'Generic Promo')->first();

        $playblock_content = $this->videos()->get();

        if ($playblock_content->count() == 0){
            $this->videos()->save($generic_promo);
            $this->videos()->save($video);
            $this->videos()->save($generic_promo);
        } else {
            $toRemove = $playblock_content->pop();
            $this->videos()->detach($toRemove->pivot->id);
            $this->videos()->save($video);
            $this->videos()->save($generic_promo);
        }

    }

    function removeVideo($video){
        $this->videos()->get();
    }
    
    
    
    
}