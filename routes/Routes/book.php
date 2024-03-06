<?php
Route::group([
    'prefix' => 'admin/books',
    'as' => 'book.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerBookController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerBookController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerBookController@store',
    ]);

    Route::get('edit/{book}', [
        'as' => 'edit',
        'uses' => 'ManagerBookController@edit',
    ]);

    Route::patch('update/{book}', [
        'as' => 'update',
        'uses' => 'ManagerBookController@update',
    ]);

    Route::delete('destroy/{book}', [
        'as' => 'destroy',
        'uses' => 'ManagerBookController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerBookController@deleteAll',
    ]);

});

use App\Http\Controllers\BookController;

Route::group([
    'prefix' => 'books',
    'as' => 'book.',
], function () {


    //Route::get('/user', [BookController::class, 'index']);

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'BookController@index',
    ]);

    Route::get('{book}', [
        'as'   => 'show',
        'uses' => 'BookController@show',
    ]);
});
