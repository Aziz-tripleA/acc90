<?php
Route::group([
    'prefix' => 'admin/employees',
    'as' => 'employee.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerEmployeeController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerEmployeeController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerEmployeeController@store',
    ]);

    Route::get('edit/{employee}', [
        'as' => 'edit',
        'uses' => 'ManagerEmployeeController@edit',
    ]);

    Route::patch('update/{employee}', [
        'as' => 'update',
        'uses' => 'ManagerEmployeeController@update',
    ]);

    Route::delete('destroy/{employee}', [
        'as' => 'destroy',
        'uses' => 'ManagerEmployeeController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerEmployeeController@deleteAll',
    ]);

});