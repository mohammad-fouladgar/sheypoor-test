<?php

use Faker\Generator as Faker;
use App\Entities\Motor;
use Illuminate\Http\UploadedFile;

$factory->define(Motor::class, function (Faker $faker) {
    $photo = UploadedFile::fake()->image('motor.png', 600, 600, 'motors', false);

    return [
        'model' => $faker->word,
        'cc' => $faker->randomDigitNotNull,
        'weight' => $faker->numberBetween(100, 500),
        'price' => $faker->randomFloat(null, 1, 1000),
        'color' => $faker->randomElement([
            'white', 'black', 'red', 'orang', 'blue', 'yellow', 'gray',
        ]),
        'photo' => basename($photo->store('motors', 'public')),
    ];
});
