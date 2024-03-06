<?php
Route::group([
    'prefix' => 'admin/topics',
    'as' => 'topic.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerArticlesTopicsController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerArticlesTopicsController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerArticlesTopicsController@store',
    ]);

    Route::get('edit/{topic}', [
        'as' => 'edit',
        'uses' => 'ManagerArticlesTopicsController@edit',
    ]);

    Route::patch('update/{topic}', [
        'as' => 'update',
        'uses' => 'ManagerArticlesTopicsController@update',
    ]);

    Route::delete('destroy/{topic}', [
        'as' => 'destroy',
        'uses' => 'ManagerArticlesTopicsController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerArticlesTopicsController@deleteAll',
    ]);

});
