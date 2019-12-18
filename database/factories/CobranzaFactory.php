<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cobranza;
use Faker\Generator as Faker;

$factory->define(Cobranza::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'operation_date' => $faker->date('Y-m-d H:i:s'),
        'destination_dni' => $faker->word,
        'sign' => $faker->text,
        'ammount' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'company_id' => $faker->randomDigitNotNull,
        'employee_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'origin' => $faker->word,
        'destination' => $faker->word,
        'ceco_id' => $faker->randomDigitNotNull
    ];
});
