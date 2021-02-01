<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | Models used in the User, Role and Permission CRUDs.
    |
    */

    'models' => [
        'user'       => App\Models\User::class,
        "post"       => \Backpack\NewsCRUD\app\Models\Post::class,
        "category"   => \Backpack\NewsCRUD\app\Models\Category::class,
        "tag"        => \Backpack\NewsCRUD\app\Models\Tag::class
    ],
];
