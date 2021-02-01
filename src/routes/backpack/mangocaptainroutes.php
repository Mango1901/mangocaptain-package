<?php

/*
|--------------------------------------------------------------------------
| Backpack\NewsCRUD Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Backpack\NewsCRUD package.
|
*/

Route::group([
    'namespace' => 'Backpack\NewsCRUD\app\Http\Controllers\Admin',
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'admin'],
], function () {
    Route::get('charts/weekly-users', 'Charts\WeeklyUsersChartController@response')->name('charts.weekly-users.index');
    Route::get('posts/ajax-custom-fields-options', 'PostCrudController@customFieldsOptions');
    Route::get('posts/ajax-category-options', 'PostCrudController@categoryOptions');
    Route::get('posts/ajax-tag-options', 'PostCrudController@tagOptions');
    Route::crud('user', 'UserCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('tag', 'TagCrudController');
    Route::crud('post', 'PostCrudController');
    Route::get('charts/new-entries', 'Charts\NewEntriesChartController@response')->name('charts.new-entries.index');
});
