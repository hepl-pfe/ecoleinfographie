<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Work::class, function (Faker\Generator $faker) {
    
    $title = ['fr' => $faker->text($maxNbChars = 30)];
    $orientation = $faker->randomElement($array = array('web', '3D', '2D'));
    $year = $faker->numberBetween($min = 1995, $max = 2017);
    $projectLink = $faker->optional($weight = 0.33, $default = null)->url();
    $video = 'https://www.youtube.com/watch?v=iNJdPyoqt8U';
    $cover = $faker->imageUrl(400, 623, 'nature');
    $description = ['fr' => $faker->paragraph($nbSentences = 14, $variableNbSentences = true)];
    $other_description = ['fr' => $faker->paragraph($nbSentences = 6, $variableNbSentences = true)];
    $otherLink = $faker->optional($weight = 0.90, $default = null)->url();
    
    
    return [
        'title' => $title,
        'orientation' => $orientation,
        'year' => $year,
        'project_link' => $projectLink,
        'cover' => $cover,
        'description' => $description,
        'other_description' => $other_description,
        'other_link' => $otherLink,
        'type_id' => $faker->randomElement($array = array(1, 2, 3, 4, 5, 6))
    ];
});
