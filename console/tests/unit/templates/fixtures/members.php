<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'username' => $faker->name,
    'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('123456'),
    'created_at' => $faker->unixTime(),
];
