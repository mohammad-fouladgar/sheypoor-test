<?php

namespace App\Search\MotorSearch;

use App\Entities\Motor;
use App\Search\Foundation\SearchableTrait;
use App\Search\Foundation\Contracts\Searchable;

class MotorSearch implements Searchable
{
    use SearchableTrait;

    const FILTER_NAMESPACE = __NAMESPACE__.'\\Filters\\';

    public static function model(): string
    {
        return Motor::class;
    }
}
