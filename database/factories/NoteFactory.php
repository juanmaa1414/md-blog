<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
	$sentence = $faker->sentence;
    return [
        'title' => $sentence,
		'slug' => str_slug($sentence),
		'user_id' => 1,
		'published' => true,
		'upvotes' => 0,
		'content' => $faker->sentence(10)
    ];
});
