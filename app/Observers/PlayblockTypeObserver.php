<?php

namespace App\Observers;

use App\PlayblockType;
use App\PlayblockStructure;

class PlayblockTypeObserver
{
    public function created(PlayblockType $playblockType){
        $structure = new PlayblockStructure;
        $structure->id = $playblockType->id;
        foreach ($vars as $element){
            
        }
    }
}