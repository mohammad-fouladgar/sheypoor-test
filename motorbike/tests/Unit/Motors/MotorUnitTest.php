<?php

namespace Tests\Unit\Motors;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Entities\Motor;

class MotorUnitTest extends TestCase
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
            'photo' => $photo->store('motors'),
        ];
    }

    /**
     * @test
     */
    public function canCreateAMotor()
    {
        $attributes = $this->getFakeAttributes();
        $created = Motor::create($attributes);

        $this->assertInstanceOf(Motor::class, $created);

        $this->assertEquals($attributes['model'], $created->model);
        $this->assertEquals($attributes['cc'], $created->cc);
        $this->assertEquals($attributes['weight'], $created->weight);
        $this->assertEquals($attributes['price'], $created->price);
        $this->assertEquals($attributes['color'], $created->color);
        $this->assertEquals($attributes['photo'], $created->photo);
    }

    /**
     * @test
     */
    public function canUpdateAMotor()
    {
        $newAttributes = $this->getFakeAttributes();
        $updated = $this->motor->update($newAttributes);

        $this->assertTrue($updated);
        $this->assertEquals($newAttributes['color'], $this->motor->color);
    }
}
