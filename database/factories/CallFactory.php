<?php

use Faker\Generator as Faker;

$factory->define(App\call::class, function (Faker $faker) {
    $character_ids = App\characters::pluck('id');
    return [
        //
        'id' => $faker->unique()->randomNumber($nbDigits = 2),
        'character_id' => $character_ids->random(),
        'day' => $faker->randomElement($array = array('1', '2', '3')),
        'call_url' => $faker->randomElement($array = array('/video/fun.mp4', '/video/junk.mp4', '/video/test.mp4', '/video/me.mp4', '/video/you.mp4'))
    ];
});
