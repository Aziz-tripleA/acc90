<?php

Route::group([
    'prefix' => 'admin/featuredImages',
    'as' => 'featured.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',

], function () {
    Route::get('', [
        'as' => 'index',
        'uses' => 'FeaturedImageController@index',
    ]);
    Route::get('edit/{featuredImage}', [
        'as' => 'edit',
        'uses' => 'FeaturedImageController@edit',
    ]);
    Route::patch('update/{featuredImage}', [
        'as' => 'update',
        'uses' => 'FeaturedImageController@update',
    ]);
});