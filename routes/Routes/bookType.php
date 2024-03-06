<?php
Route::group([
    'prefix' => 'admin/types',
    'as' => 'bookType.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerBookTypeController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerBookTypeController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerBookTypeController@store',
    ]);

    Route::get('edit/{bookType}', [
        'as' => 'edit',
        'uses' => 'ManagerBookTypeController@edit',
    ]);

    Route::patch('update/{bookType}', [
        'as' => 'update',
        'uses' => 'ManagerBookTypeController@update',
    ]);

    Route::delete('destroy/{bookType}', [
        'as' => 'destroy',
        'uses' => 'ManagerBookTypeController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerBookTypeController@deleteAll',
    ]);

});
