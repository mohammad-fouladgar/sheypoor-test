<?php

namespace App\Search\Foundation;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

trait SearchableTrait
{
    public static function filter(Request $filters)
    {
        $query = static::applyDecoratorsFromRequest(
            $filters, app(self::MODEL)->newQuery()
        );

        return static::getResults($query);
    }

    private static function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        foreach (static::getFilters($request) as $filterName => $value) {
            $decorator = static::createFilterDecorator($filterName);

            if (static::isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);
            }
        }

        return $query;
    }

    /**
     * Get the needed filters from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    protected static function getFilters(Request $request): array
    {
        return $request->all();
    }

    private static function createFilterDecorator(string $name): string
    {
        return  self::FILTER_NAMESPACE.str_replace(' ', '',
                    ucwords(str_replace('_', ' ', $name))
                );
    }

    private static function isValidDecorator(string $decorator): bool
    {
        return class_exists($decorator);
    }

    private static function getResults(Builder $query)
    {
        return $query->paginate();
    }
}
