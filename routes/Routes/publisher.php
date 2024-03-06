<?php
Route::group([
    'prefix' => 'admin/publishers',
    'as' => 'publisher.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerPublisherController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerPublisherController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerPublisherController@store',
    ]);

    Route::get('edit/{publisher}', [
        'as' => 'edit',
        'uses' => 'ManagerPublisherController@edit',
    ]);

    Route::patch('update/{publisher}', [
        'as' => 'update',
        'uses' => 'ManagerPublisherController@update',
    ]);

    Route::delete('destroy/{publisher}', [
        'as' => 'destroy',
        'uses' => 'ManagerPublisherController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerPublisherController@deleteAll',
    ]);

});
