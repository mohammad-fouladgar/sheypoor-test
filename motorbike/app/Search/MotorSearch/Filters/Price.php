<?php

namespace App\Search\MotorSearch\Filters;

use Illuminate\Database\Eloquent\Builder;

class Price extends Filter
{
    public static function apply(Builder $builder, $value)
    {
        $args = func_get_args();
        $args = array_add($args, 2, self::class);

        return call_user_func_array([self::class, 'getResolver'], $args);
    }

    protected static function applyFilter(Builder $builder, $value)
    {
        list($min, $max) = explode(',', $value);

        return $builder
                    ->where('price', '>=', (int) $min)
                    ->where('price', '<=', (int) $max);
    }
}
