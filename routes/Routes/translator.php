<?php
Route::group([
    'prefix' => 'admin/translators',
    'as' => 'translator.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerTranslatorController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerTranslatorController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerTranslatorController@store',
    ]);

    Route::get('edit/{translator}', [
        'as' => 'edit',
        'uses' => 'ManagerTranslatorController@edit',
    ]);

    Route::patch('update/{translator}', [
        'as' => 'update',
        'uses' => 'ManagerTranslatorController@update',
    ]);

    Route::delete('destroy/{translator}', [
        'as' => 'destroy',
        'uses' => 'ManagerTranslatorController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerTranslatorController@deleteAll',
    ]);

});
