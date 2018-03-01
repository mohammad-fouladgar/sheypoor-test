<?php

namespace App\Search\Foundation\Contracts;

use Illuminate\Http\Request;

interface Searchable
{
    /**
     * Undocumented function.
     *
     * @param Request $filters
     */
    public static function filter(Request $filters);
}
