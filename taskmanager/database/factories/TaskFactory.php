<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\User;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    $count = User::count();

    return [
        'name'=>$faker->sentence(2, true),
        'start_at'=>$faker->dateTime($max = 'now', $timezone = null),
        'end_at'=>$faker->dateTime($max = 'now', $timezone = null),
        'user_id'=>$faker->numberBetween(1, $count),
    ];
});
