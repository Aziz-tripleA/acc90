<?php
Route::group([
    'prefix' => 'admin/audios',
    'as' => 'audio.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerAudioController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerAudioController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerAudioController@store',
    ]);

    Route::get('edit/{audio}', [
        'as' => 'edit',
        'uses' => 'ManagerAudioController@edit',
    ]);

    Route::patch('update/{audio}', [
        'as' => 'update',
        'uses' => 'ManagerAudioController@update',
    ]);

    Route::delete('destroy/{audio}', [
        'as' => 'destroy',
        'uses' => 'ManagerAudioController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerAudioController@deleteAll',
    ]);

});