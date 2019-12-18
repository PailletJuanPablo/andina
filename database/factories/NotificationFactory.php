<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Notification;
use Faker\Generator as Faker;

$factory->define(Notification::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'user_id' => $faker->randomDigitNotNull,
        'title' => $faker->word,
        'content' => $faker->word,
        'image' => $faker->word,
        'type' => $faker->randomDigitNotNull,
        'segment' => $faker->word,
        'document_id' => $faker->randomDigitNotNull,
        'role' => $faker->word
    ];
});
