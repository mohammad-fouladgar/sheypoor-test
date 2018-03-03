<?php

namespace App\Search\Foundation\Contracts;

use App\Search\MotorSearch\Filters\Filter;

interface FilterFactory
{
    /**
     * Undocumented function.
     *
     * @param string $filter
     *
     * @return Filter
     */
    public static function factoryMethod(string $filter): Filter;
}
