<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayblockType extends Model
{
    protected $fillable = ['title'];

    public function playblocks(){
        return $this->hasMany('App\Playblock');
    }
}
