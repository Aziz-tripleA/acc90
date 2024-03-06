<?php
Route::group([
    'prefix' => 'admin/numbers',
    'as' => 'number.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerNumberController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerNumberController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerNumberController@store',
    ]);

    Route::get('edit/{number}', [
        'as' => 'edit',
        'uses' => 'ManagerNumberController@edit',
    ]);

    Route::patch('update/{number}', [
        'as' => 'update',
        'uses' => 'ManagerNumberController@update',
    ]);

    Route::delete('destroy/{number}', [
        'as' => 'destroy',
        'uses' => 'ManagerNumberController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerNumberController@deleteAll',
    ]);

});