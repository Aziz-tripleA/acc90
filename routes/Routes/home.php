<?php

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index',
]);

Route::group([
    'prefix' => 'admin/homeconfigs',
    'as' => 'home.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',

], function () {
    Route::get('', [
        'as' => 'index',
        'uses' => 'HomeConfigsController@index',
    ]);
    Route::patch('update', [
        'as' => 'update',
        'uses' => 'HomeConfigsController@update',
    ]);
    Route::get('clearCache', [
        'as' => 'clearCache',
        'uses' => 'HomeConfigsController@clearCache',
    ]);
});