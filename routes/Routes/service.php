<?php
Route::group([
    'prefix' => 'admin/services',
    'as' => 'service.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerServiceController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerServiceController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerServiceController@store',
    ]);

    Route::get('edit/{service}', [
        'as' => 'edit',
        'uses' => 'ManagerServiceController@edit',
    ]);

    Route::patch('update/{service}', [
        'as' => 'update',
        'uses' => 'ManagerServiceController@update',
    ]);

    Route::delete('destroy/{service}', [
        'as' => 'destroy',
        'uses' => 'ManagerServiceController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerServiceController@deleteAll',
    ]);

});

Route::group([
    'prefix' => 'counseling-services',
    'as' => 'service.',
], function () {


    // Route::get('/', [
    //     'as'   => 'index',
    //     'uses' => 'ServiceController@index',
    // ]);

    Route::get('/{service?}', [
        'as'   => 'index',
        'uses' => 'ServiceController@index',
    ]);


});
