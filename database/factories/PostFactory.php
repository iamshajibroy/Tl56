<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
         'category_id' => $faker->numberBetween(1,5),
         'title' =>  $faker->sentence,
         'house_details' => $faker->paragraph,
         'address' => $faker->address,
         'image' => '1531648652.jpg',
         'added_by' => $faker->numberBetween(1,6),
         'status'  =>$faker->numberBetween(0,1),
         'cell'  => $faker->phoneNumber,
         'start_date' => $faker->date('Y-m-d'),
         'rent' =>2342, 
    ] ;
});


 