<?php

use Faker\Generator as Faker;

$factory->define(App\AdminUser::class, function (Faker $faker) {
    return [
       'name' => 'Admin',
        'email' => 'admin@mail.com',
        'image' => 'avatar.jpg',
        'password' => Hash::make('secret'),
        'remember_token' => str_random(10),
    ];
});
