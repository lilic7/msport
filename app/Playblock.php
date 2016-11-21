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
        $videos->each(function($video){
            $this->videos()->attach($video);
        });
    }

    public function remove(Collection $videos){
        $videos->each(function($video){
            $this->videos()->detach($video);
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