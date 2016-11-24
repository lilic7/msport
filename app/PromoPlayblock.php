<?php

namespace App;

use App\Scopes\PlayblockTypeScope;
use Illuminate\Database\Eloquent\Model;

class PromoPlayblock extends Playblock
{
    protected $table = 'playblocks';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new PlayblockTypeScope);
    }
    
    
}
