<?php
Route::group([
    'prefix' => 'admin/categories',
    'as' => 'bookCategory.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerBookCategoryController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerBookCategoryController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerBookCategoryController@store',
    ]);

    Route::get('edit/{bookCategory}', [
        'as' => 'edit',
        'uses' => 'ManagerBookCategoryController@edit',
    ]);

    Route::patch('update/{bookCategory}', [
        'as' => 'update',
        'uses' => 'ManagerBookCategoryController@update',
    ]);

    Route::delete('destroy/{bookCategory}', [
        'as' => 'destroy',
        'uses' => 'ManagerBookCategoryController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerBookCategoryController@deleteAll',
    ]);

});
