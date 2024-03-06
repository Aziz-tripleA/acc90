<?php
Route::group([
    'prefix' => 'admin/announcements',
    'as' => 'ads.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerAdsController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerAdsController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerAdsController@store',
    ]);

    Route::get('edit/{ads}', [
        'as' => 'edit',
        'uses' => 'ManagerAdsController@edit',
    ]);

    Route::patch('update/{ads}', [
        'as' => 'update',
        'uses' => 'ManagerAdsController@update',
    ]);

    Route::delete('destroy/{ads}', [
        'as' => 'destroy',
        'uses' => 'ManagerAdsController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerAdsController@deleteAll',
    ]);

});

Route::group([
    'prefix' => 'advertisements',
    'as' => 'ads.',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'AdsController@index',
    ]);

    Route::get('{ads}', [
        'as'   => 'show',
        'uses' => 'AdsController@show',
    ]);
});
