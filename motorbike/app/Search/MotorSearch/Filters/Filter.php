<?php

namespace App\Search\MotorSearch\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    /**
     * Apply the filter to a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed   $value
     *
     * @return Builder
     */
    abstract public static function apply(Builder $builder, $value);

    protected static function getResolver()
    {
        $args = func_get_args();

        $resolver = [array_get($args, 2), 'applyFilter'];

        return call_user_func_array($resolver, $args);
    }
}
