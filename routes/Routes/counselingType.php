<?php
Route::group([
    'prefix' => 'admin/counselingTypes',
    'as' => 'counselingType.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'CounselingTypeController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'CounselingTypeController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'CounselingTypeController@store',
    ]);

    Route::get('edit/{counselingType}', [
        'as' => 'edit',
        'uses' => 'CounselingTypeController@edit',
    ]);

    Route::patch('update/{counselingType}', [
        'as' => 'update',
        'uses' => 'CounselingTypeController@update',
    ]);

    Route::delete('destroy/{counselingType}', [
        'as' => 'destroy',
        'uses' => 'CounselingTypeController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'CounselingTypeController@deleteAll',
    ]);

});