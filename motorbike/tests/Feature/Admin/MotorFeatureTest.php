<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class MotorFeatureTest extends TestCase
{
    protected function getFakeAttributes()
    {
        $photo = UploadedFile::fake()->image('motor.png', 600, 600, 'motors');

        return [
            'model' => $this->faker->word,
            'cc' => $this->faker->randomDigitNotNull,
            'weight' => $this->faker->numberBetween(100, 500),
            'price' => $this->faker->randomFloat(null, 1, 8),
            'color' => $this->faker->colorName(),
            'photo' => $photo,
        ];
    }

    /**
     * @test
     */
    public function canSeeCreateMotorBikesLink()
    {
        $response = $this->actingAs($this->admin)->get('/home');

        $response
            ->assertStatus(200)
            ->assertSee('Create A New MotorBikes');
    }

    /**
     * @test
     */
    public function canRedirectIfAdminIsGuest()
    {
        $response = $this->get(route('motors.create'));

        $response
            ->assertStatus(302)
            ->assertRedirect();
    }

    /*
     * @test
     */
    public function canVisitCreateANewMotorBikesPage()
    {
        $response = $this->actingAs($this->admin)->get(route('motors.create'));

        $response
            ->assertStatus(200)
            ->assertViewIs('create-motor');
    }

    /**
     * @test
     */
    public function canCreateAMotorBikes()
    {
        $params = $this->getFakeAttributes();

        $response = $this->actingAs($this->admin)
                         ->post(route('motors.store'), $params);

        $response
            ->assertStatus(302)
            ->assertRedirect()
            ->assertSessionHas('status', 'Create motorbikes successful.');
    }

    /**
     * @test
     */
    public function canReturnErrorsCreatingTheMotorWhenTheRequiredFieldsAreNotFilled()
    {
        $this
              ->actingAs($this->admin)
              ->post(route('motors.store'), [])
              ->assertStatus(302)
              ->assertSessionHasErrors();
    }
}
