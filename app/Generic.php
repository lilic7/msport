<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generic extends Model
{
    protected $fillable = ['title', 'length', 'frames', 'category_id', 'path', 'onair'];

    public function categories(){
        return $this->belongsTo('App\Category');
    }
}
