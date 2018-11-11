<?php

$faker = \Faker\Factory::create();
$faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));


$factory->define(App\Food::class, function () use($faker) {

    $randomImages = [
        'https://cdn.guidingtech.com/imager/media/assets/HD-Mouth-Watering-Food-Wallpapers-for-Desktop-12_acdb3e4bb37d0e3bcc26c97591d3dd6b.jpg',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7BR20zfqGxdijtLO2UOzrEJ6p83SQO7LW5dyQBgRGv6rmsnjs',
        'https://assets.kraftfoods.com/recipe_images/opendeploy/502909_1_1_retail-8686e7cdb7d4497a9c723ef58397f3536b1cf0b6_642x428.jpg'
    ];

    return [
        'title' => $faker->foodName(),
        'image' => function() use ($randomImages) {
            return $randomImages[rand(0,2)];
        },
        'description' => $faker->text(),
        'price' => $faker->randomNumber(2),
        'user_id' => function() {
            return factory('App\User')->create()->id;
        }
    ];
});


$factory->state(App\Food::class, 'test', function ($faker) {
    return [
    ];
});

