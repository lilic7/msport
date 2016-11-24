<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Playblock extends Model
{
    protected $fillable = ['title', 'duration', 'frames'];

    protected $maxDuration;
    
    public function videos(){
        return $this->belongsToMany(Video::class, 'playblock_video', 'playblock_id')->withPivot('id');
    }

    public function playblockType(){
        return $this->belongsTo(PlayblockType::class);
    }

    function totalDuration(){
        return $this->attributes['duration'] . "." . $this->attributes['frames'];
    }
    
    

    /**
     * @param Collection $videos
     * @param int $maxDuration
     */
    public function add(Collection $videos, $maxDuration = 0){

        if ( $maxDuration ) {
            $this->maxDuration = $maxDuration;
        }

        $videos->each(function(Video $video){

            if ($this->maxDuration && ($this->duration + $video->duration > $this->maxDuration)){
                return;
            }

            $this->videos()->attach($video);

            $this->duration += $video->duration;

            $this->frames += $video->frames;

            if( $this->frames > 100){

                $multiplier = (int) floor($this->frames / 100);

                $this->frames -= 100 * $multiplier;

                $this->duration += $multiplier;
            }
        });
    }

    /**
     * @param Collection $videos
     */
    public function remove(Collection $videos){

        $videos->each(function(Video $video){

            $this->videos()->detach($video);

            $this->duration -= $video->duration;

            if ( $this->frames < $video->frames ){

                $this->duration--;

                $this->frames = $this->frames - $video->frames + 100;
            }

        });
    }
}