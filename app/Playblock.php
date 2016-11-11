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

    public function getLengthAttribute(){
        return 75;
    }

    public function addVideo($videos){
        foreach ($videos as $video){
            $this->videos()->attach($video);
        }
    }
}