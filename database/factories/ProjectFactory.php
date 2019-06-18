<?php

use Faker\Generator as Faker;

$factory->define(App\Projects::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'owner_id' => function(){ 
            return factory(App\User::class)->create()->id;
        }
    ];
});
