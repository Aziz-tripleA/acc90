<?php
Route::group([
    'prefix' => 'admin/lecturers',
    'as' => 'lecturer.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerLecturerController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerLecturerController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerLecturerController@store',
    ]);

    Route::get('edit/{lecturer}', [
        'as' => 'edit',
        'uses' => 'ManagerLecturerController@edit',
    ]);

    Route::patch('update/{lecturer}', [
        'as' => 'update',
        'uses' => 'ManagerLecturerController@update',
    ]);

    Route::delete('destroy/{lecturer}', [
        'as' => 'destroy',
        'uses' => 'ManagerLecturerController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerLecturerController@deleteAll',
    ]);

});
