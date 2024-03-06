<?php
Route::group([
    'prefix' => 'admin/writers',
    'as' => 'writer.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerWriterController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerWriterController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerWriterController@store',
    ]);

    Route::get('edit/{writer}', [
        'as' => 'edit',
        'uses' => 'ManagerWriterController@edit',
    ]);

    Route::patch('update/{writer}', [
        'as' => 'update',
        'uses' => 'ManagerWriterController@update',
    ]);

    Route::delete('destroy/{writer}', [
        'as' => 'destroy',
        'uses' => 'ManagerWriterController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerWriterController@deleteAll',
    ]);

});
