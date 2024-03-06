<?php
Route::group([
    'prefix' => 'admin/goals',
    'as' => 'perpos.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerPerposController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerPerposController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerPerposController@store',
    ]);

    Route::get('edit/{perpos}', [
        'as' => 'edit',
        'uses' => 'ManagerPerposController@edit',
    ]);

    Route::patch('update/{perpos}', [
        'as' => 'update',
        'uses' => 'ManagerPerposController@update',
    ]);

    Route::delete('destroy/{perpos}', [
        'as' => 'destroy',
        'uses' => 'ManagerPerposController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerPerposController@deleteAll',
    ]);

});