<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playblock extends Model
{
    protected $fillable = ['title', 'length'];
    
    public function videos(){
        return $this->belongsToMany(Video::class);
    }

    public function playblockType(){
        return $this->belongsTo(PlayblockType::class);
    }

    function scopeType($query, $type){

        $playblock_type = PlayblockType::where('title', $type)->first();

        return $query->where('playblock_type_id', $playblock_type->id);
    }
}