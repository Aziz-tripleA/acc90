<?php
Route::group([
    'prefix' => 'admin/values',
    'as' => 'value.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerValueController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerValueController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerValueController@store',
    ]);

    Route::get('edit/{value}', [
        'as' => 'edit',
        'uses' => 'ManagerValueController@edit',
    ]);

    Route::patch('update/{value}', [
        'as' => 'update',
        'uses' => 'ManagerValueController@update',
    ]);

    Route::delete('destroy/{value}', [
        'as' => 'destroy',
        'uses' => 'ManagerValueController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerValueController@deleteAll',
    ]);

});
