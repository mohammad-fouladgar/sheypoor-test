<?php

namespace Tests\Feature\Front;

use Tests\TestCase;
use App\Entities\Motor;

class MotorFeatureTest extends TestCase
{
    /**
     * @test
     */
    public function canListAllMotors()
    {
        $motor = factory(Motor::class)->create();

        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertViewHas('motors')
            ->assertSee($motor->model);
    }

    /**
     * @test
     */
    public function canFilterMotorBikeByColors()
    {
        $motor = factory(Motor::class)->create();

        $queries = [
            'colors' => [
                $motor->color,
            ],
        ];

        $response = $this->get('/search?'.http_build_query($queries));

        $response
            ->assertStatus(200)
            ->assertViewHas('motors')
            ->assertSee($motor->color);
    }

    /**
     * @test
     */
    public function canSeeNotFoundMotors()
    {
        $queries = [
            'colors' => [
                'pink',
            ],
        ];

        $response = $this->get('/search?'.http_build_query($queries));

        $response
            ->assertStatus(200)
            ->assertSee('Not Found Motors');
    }

    /**
     * @test
     */
    public function canShowMotorBike()
    {
        $response = $this->get(route('motors.show', $this->motor->id));

        $response
            ->assertStatus(200)
            ->assertSee($this->motor->model);
    }

    /**
     * @test
     */
    public function canRedirectTo404PgaeIfNotFoundAMotorBike()
    {
        $response = $this->get(route('motors.show', 'foo_id'));

        $response
            ->assertStatus(404)
            ->assertSee('Sorry, the page you are looking for could not be found.');
    }
}
