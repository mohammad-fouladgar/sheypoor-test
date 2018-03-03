<?php

namespace Tests\Unit\Search;

use Tests\TestCase;
use App\Search\Foundation\ConcreteFilterFactory;
use App\Search\Foundation\Contracts\FilterFactory;
use App\Search\MotorSearch\Filters\Filter;
use App\Search\MotorSearch\Filters\Colors;

class FiltersUnitTest extends TestCase
{
    /**
     *@test
     */
    public function itShouldReturnInstanceOfTheFilterFactory()
    {
        $this->assertInstanceOf(FilterFactory::class, new ConcreteFilterFactory());
    }

    /**
     *@test
     */
    public function itShouldReturnInstanceOfTheAbstractFilter()
    {
        $this->assertInstanceOf(Filter::class, new Colors());
    }

    /**
     * @test
     */
    public function canMakeAColorsFilterByFactory()
    {
        $colorFilter = ConcreteFilterFactory::factoryMethod(Colors::class);

        $this->assertInstanceOf(Filter::class, $colorFilter);
    }

    /**
     * @test
     * @expectedException              \InvalidArgumentException
     * @expectedExceptionMessage       Filter is not supported.
     */
    public function itShouldReturnInvalidArgsException()
    {
        ConcreteFilterFactory::factoryMethod(InvalidFilter::class);
    }
}
