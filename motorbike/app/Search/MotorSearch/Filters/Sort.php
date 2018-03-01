<?php

namespace App\Search\MotorSearch\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Search\Foundation\ShouldValidate;

class Sort extends Filter
{
    use ShouldValidate;

    public static function apply(Builder $builder, $value)
    {
        $args = func_get_args();
        $args = array_add($args, 2, self::class);

        return call_user_func_array([self::class, 'getResolver'], $args);
    }

    protected static function rules()
    {
        return [
            'sort' => 'in:created_at,price',
        ];
    }

    protected static function applyFilter(Builder $builder, $value)
    {
        return $builder->orderBy($value);
    }
}
