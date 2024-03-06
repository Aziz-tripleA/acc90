<?php
Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['manager_access'],

], function () {
    Route::get('/', [
        'as' => 'dashboard',
        'uses' => 'HomeController@dashboard',
    ]);
    Route::get('profile', [
        'as' => 'profile',
        'uses' => 'HomeController@profile',
    ]);
});
Route::group(['as' => 'user.'], function () {
    /* -------------------------------- manager -------------------------------- */
    Route::group([
        'as' => 'admin.',
        'prefix' => 'admin/users',
        'namespace' => 'Admin',
    ], function () {
        Route::get('/', [
            'as' => 'index',
            'uses' => 'ManagerUserController@index',
        ]);
        Route::get('export', [
            'as' => 'export',
            'uses' => 'ManagerUserController@export',
        ]);
        Route::get('{user}', [
            'as' => 'edit',
            'uses' => 'ManagerUserController@edit',
        ]);
        Route::delete('destroy/{user}', [
            'as' => 'destroy',
            'uses' => 'ManagerUserController@destroy',
        ]);
        Route::delete('bulkDelete', [
            'as' => 'deleteAll',
            'uses' => 'ManagerUserController@deleteAll',
        ]);
    });

    /* -------------------------------- resource -------------------------------- */
    Route::group(['prefix' => 'users'], function () {
        Route::get('dashboard', [
            'as' => 'dashboard',
            'uses' => 'UserController@index',
        ]);

        Route::get('show/{id}', [
            'as' => 'show',
            'uses' => 'UserController@show',
        ]);

        Route::get('edit/{id?}', [
            'as' => 'edit',
            'uses' => 'UserController@edit',
        ]);

        Route::patch('update/{id?}', [
            'as' => 'update',
            'uses' => 'UserController@update',
        ]);

        Route::get('notifications', [
            'as' => 'notifications',
            'uses' => 'UserController@notifications',
        ]);
        Route::patch('updateLocale/{code}', [
            'as'   => 'updateLocale',
            'uses' => 'UserController@updateLocale',
        ]);
        Route::post('selectCharities', [
            'as'   => 'selectCharities',
            'uses' => 'UserController@selectCharities',
        ]);

    });
});
