<?php

use Faker\Generator as Faker;

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        // 예전 방식
        // 'thread_id' => function () {
        //     return factory('App\Thread')->create()->id;
        // },

        // 바뀐 형태 : 위 형태를 라라벨이 알아서 자동으로 해주도록 변화
        // 'thread_id' => factory('App\Thread'),
        'thread_id' => factory('App\Thread'),
        'user_id' => factory('App\User'),
        'body' => $faker->paragraph
            //
    ];
});
