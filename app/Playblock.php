<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Playblock extends Model
{
    protected $fillable = ['title', 'duration', 'frames'];
    protected $totalFrames;
    protected $totalDuration;
    protected $durationSum;
    protected $framesSum;

    protected $maxDuration;
    
    public function videos(){
        return $this->belongsToMany(Video::class)->withPivot('id');
    }

    public function playblockType(){
        return $this->belongsTo(PlayblockType::class);
    }

    function totalDuration(){
        return $this->attributes['duration'] . "." . $this->attributes['frames'];
    }

    public function add(Collection $videos, $maxDuration = 0){

        if ( $maxDuration ) {
            $this->maxDuration = $maxDuration;
        }

        $videos->each(function(Video $video){

            if ($this->maxDuration && ($this->duration + $video->duration > $this->maxDuration)){
                return false;
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





    private function calculate_total_duration($video, $maxDuration){
        $oldDuration = $this->duration;
        $oldFrames = $this->frames;

        $newDuration = $this->duration + $video->duration;

        if($maxDuration){
            $this->totalDuration = $newDuration > $maxDuration ? $oldDuration : $newDuration + (int) $this->calculate_frames($video);
        } else {
            $this->totalDuration = $newDuration;
        }
    }

    private function calculate_frames($video){
        $this->totalFrames = $this->frames + $video->frames;
        $secconds_to_add = 0;
        if ( $this->totalFrames > 100 ) {
            $secconds_to_add = floor($this->totalFrames / 100);
            $this->totalFrames %= 100;
        }
        return $secconds_to_add;
    }

    private function updateDuration(){
        $this->update(['duration' => $this->totalDuration]);
    }

    private function updateFrames(){
        $this->update(['frames' => $this->totalFrames]);
    }
}