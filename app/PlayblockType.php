<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayblockType extends Model
{
    protected $fillable = ['title'];

    public function playblocks(){
        return $this->hasMany(Playblock::class);
    }

    public function structureElements(){
        return $this->hasOne(PlayblockStructure::class);
    }
    
    public function createElements($data){
        foreach ($data as $element){

        }
    }
}
