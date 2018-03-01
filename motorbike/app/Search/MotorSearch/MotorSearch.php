<?php

namespace App\Search\MotorSearch;

use App\Entities\Motor;
use App\Search\Foundation\SearchableTrait;
use App\Search\Foundation\Contracts\Searchable;

class MotorSearch implements Searchable
{
    use SearchableTrait;

    const MODEL = Motor::class;
    const FILTER_NAMESPACE = __NAMESPACE__.'\\Filters\\';
}
