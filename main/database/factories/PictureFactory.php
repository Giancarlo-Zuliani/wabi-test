<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Picture;
use Faker\Generator as Faker;

$factory->define(Picture::class, function (Faker $faker) {
    $picArr = ['maeg.png' , 'bancai.png' , 'palace.png' , 'anonimacastelli.png' , 'book.png' ,'corolla.png'];
    return [
        'url' => $picArr[rand(0 , count($picArr) - 1)],
        'description' => $faker -> sentence
    ];
});
