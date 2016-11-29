<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayblockStructure extends Model
{
    protected $fillable = ['playblock_type_id', 'var_name', 'var_value', 'var_value_type'];

    public function playblockType(){
        return $this->belongsTo(PlayblockType::class);
    }
}
