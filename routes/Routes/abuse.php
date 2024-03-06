<?php
Route::group([
    'prefix' => 'admin/abusenumbers',
    'as' => 'abuse.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerAbuseNumberController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerAbuseNumberController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerAbuseNumberController@store',
    ]);

    Route::get('edit/{abuse}', [
        'as' => 'edit',
        'uses' => 'ManagerAbuseNumberController@edit',
    ]);

    Route::patch('update/{abuse}', [
        'as' => 'update',
        'uses' => 'ManagerAbuseNumberController@update',
    ]);

    Route::delete('destroy/{abuse}', [
        'as' => 'destroy',
        'uses' => 'ManagerAbuseNumberController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerAbuseNumberController@deleteAll',
    ]);

});