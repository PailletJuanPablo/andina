<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CompanyMeta;
use Faker\Generator as Faker;

$factory->define(CompanyMeta::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'title' => $faker->word,
        'description' => $faker->text,
        'user_id' => $faker->randomDigitNotNull,
        'company_id' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
