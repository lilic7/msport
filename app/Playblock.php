<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playblock extends Model
{
    protected $fillable = ['title', 'length'];
    
    public function videos(){
        return $this->belongsToMany('App\Videos');
    }

    public function playblockType(){
        return $this->belongsTo('App\PlayblockType');
    }
}
