<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playblock extends Model
{
    protected $fillable = ['title', 'duration', 'frames'];
    protected $totalFrames;
    protected $totalDuration;
    
    public function videos(){
        return $this->belongsToMany(Video::class)->withPivot('id');
    }

    public function playblockType(){
        return $this->belongsTo(PlayblockType::class);
    }

    function totalDuration(){
        return $this->attributes['duration'] . "." . $this->attributes['frames'];
    }

    public function addVideos($videos, $maxDuration = 0){

        foreach ($videos as $video){

            // if maxDuration != null
            // adauga video in block pana ajunge aproape de durata maxima, dar o intrece

            // if maxDuration == null
            // adauga video din categorie



            $this->videos()->attach($video);

            $this->calculate_total_duration($video, $maxDuration);

            $this->updateDuration();
            $this->updateFrames();
        }

    }

    private function calculate_total_duration($video, $maxDuration){

        $this->totalDuration = $this->duration + $video->duration + (int) $this->calculate_frames($video);

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