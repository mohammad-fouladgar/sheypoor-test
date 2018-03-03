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

    /**
     * Return a namespace of the eloquent model.
     *
     * @return string
     */
    public static function model(): string;
}
