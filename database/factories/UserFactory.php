<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'first_name' => $faker->word,
        'last_name' => $faker->word,
        'email' => $faker->word,
        'email_verified_at' => $faker->date('Y-m-d H:i:s'),
        'password' => $faker->word,
        'dni' => $faker->randomDigitNotNull,
        'remember_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'role_id' => $faker->randomDigitNotNull,
        'organization' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'company_id' => $faker->randomDigitNotNull,
        'registration_status_id' => $faker->randomDigitNotNull,
        'identificator' => $faker->word
    ];
});
