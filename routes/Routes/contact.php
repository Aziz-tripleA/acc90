<?php

Route::group([
    'prefix' => 'admin/contacts',
    'as' => 'contact.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',

], function () {
    Route::get('', [
        'as' => 'index',
        'uses' => 'ManagerContactDataController@index',
    ]);
    Route::get('clearCache', [
        'as' => 'clearCache',
        'uses' => 'ManagerContactDataController@clearCache',
    ]);
    Route::patch('update', [
        'as' => 'update',
        'uses' => 'ManagerContactDataController@update',
    ]);
});
