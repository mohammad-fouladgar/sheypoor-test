<?php

namespace App\Search\Foundation;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Search\Foundation\ConcreteFilterFactory as FilterFactory;

trait SearchableTrait
{
    public static function filter(Request $filters)
    {
        $query = static::applyDecoratorsFromRequest(
            $filters, app(static::model())->newQuery()
        );

        return static::getResults($query);
    }

    protected static function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        foreach (static::getFilters($request) as $filterName => $value) {
            $decorator = static::createFilterDecorator($filterName);

            try {
                $query = FilterFactory::factoryMethod($decorator)::apply($query, $value);
            } catch (\InvalidArgumentException $e) {
                \Log::warning($e->getMessage());
            }
        }

        return $query;
    }

    protected static function createFilterDecorator(string $name): string
    {
        return  self::FILTER_NAMESPACE.str_replace(' ', '',
                    ucwords(str_replace('_', ' ', $name))
                );
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

    protected static function getResults(Builder $query)
    {
        return $query->paginate();
    }
}
