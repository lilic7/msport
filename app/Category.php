<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['title', 'parent_category_id', 'path'];
    
    public function categories(){
        return $this->hasMany('App\Category');
    }

    public function promos(){
        return $this->hasMany('App\Promo');
    }
}
