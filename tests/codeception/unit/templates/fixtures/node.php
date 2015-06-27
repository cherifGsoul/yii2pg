<?php
$types = ['article','page'];
$key = array_rand($types);
$type = $types[$key];

return [
	'guid'=>$faker->uuid,
	'title'=>$faker->sentence,
	'content'=>$faker->text,
	'excerpt'=>$faker->text($maxNbChars = 100),
	'type'=>$type,
];