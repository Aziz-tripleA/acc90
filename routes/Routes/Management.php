<?php

Route::group([
    'prefix' => 'admin/management',
    'as' => 'management.admin.',
    'namespace' => 'Admin',
   'middleware' => 'manager_access',
], function () {
    /* -------------------------------- resource -------------------------------- */
    Route::group([
        'prefix' => 'roles',
        'as' => 'role.',
    ], function () {
        /* -------------------------------- resource -------------------------------- */
        Route::get('/', [
            'as' => 'index',
            'uses' => 'ManagerRoleController@index',
        ]);

        Route::get('create', [
            'as' => 'create',
            'uses' => 'ManagerRoleController@create',
        ]);

        Route::post('/', [
            'as' => 'store',
            'uses' => 'ManagerRoleController@store',
        ]);

        Route::get('{role}', [
            'as' => 'edit',
            'uses' => 'ManagerRoleController@edit',
        ]);

        Route::patch('update/{role}', [
            'as' => 'update',
            'uses' => 'ManagerRoleController@update',
        ]);

        Route::delete('destroy/{role}', [
            'as' => 'destroy',
            'uses' => 'ManagerRoleController@destroy',
        ]);
    });
    Route::group([
        'prefix' => 'admins',
        'as' => 'user.',
    ], function () {
        /* -------------------------------- resource -------------------------------- */
        Route::get('/', [
            'as' => 'index',
            'uses' => 'ManagerAdminController@index',
        ]);

        Route::get('create', [
            'as' => 'create',
            'uses' => 'ManagerAdminController@create',
        ]);

        Route::post('/', [
            'as' => 'store',
            'uses' => 'ManagerAdminController@store',
        ]);

        Route::get('{user}', [
            'as' => 'edit',
            'uses' => 'ManagerAdminController@edit',
        ]);
        Route::patch('update/{user}', [
            'as' => 'update',
            'uses' => 'ManagerAdminController@update',
        ]);

        Route::delete('destroy/{user}', [
            'as' => 'destroy',
            'uses' => 'ManagerAdminController@destroy',
        ]);
    });
});
