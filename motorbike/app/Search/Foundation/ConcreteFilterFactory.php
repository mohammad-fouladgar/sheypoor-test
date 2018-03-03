<?php

namespace App\Search\Foundation;

use App\Search\Foundation\Contracts\FilterFactory;
use App\Search\MotorSearch\Filters\Filter;

class ConcreteFilterFactory implements FilterFactory
{
    public static function factoryMethod(string $filter): Filter
    {
        return static::makeFilter($filter);
    }

    /**
     * Undocumented function.
     *
     * @param string $filter
     */
    protected static function makeFilter(string $filter)
    {
        if (static::isValidFilter($filter)) {
            return app($filter);
        }

        throw new \InvalidArgumentException('Filter is not supported.');
    }

    protected static function isValidFilter(string $filter): bool
    {
        return class_exists($filter);
    }
}
