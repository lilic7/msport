<?php
/**
 * Created by PhpStorm.
 * User: Tomm
 * Date: 24.11.2016
 * Time: 11:22
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\PlayblockType;

class PlayblockTypeScope implements Scope{

    /**
     * @param Builder $builder
     * @param Model $model
     */
    public function apply(Builder $builder, Model $model)
    {
        $type = PlayblockType::where('title', 'promo');

        $builder->where('type', '=', $type->id);
    }

}