<?php

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index',
]);

Route::group([
    'prefix' => 'admin/homeconfigs',
    'as' => 'home.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',

], function () {
    Route::get('', [
        'as' => 'index',
        'uses' => 'HomeConfigsController@index',
    ]);
    Route::patch('update', [
        'as' => 'update',
        'uses' => 'HomeConfigsController@update',
    ]);
    Route::get('clearCache', [
        'as' => 'clearCache',
        'uses' => 'HomeConfigsController@clearCache',
    ]);
    Route::get('featured/items/{type}', [
        'as'=>'featured.items',
        'uses' => 'FeaturedController@getItems']);

    Route::get('featured', [
        'as' => 'featured.index',
        'uses' => 'FeaturedController@index']);

    Route::post('featured', [
        'as' => 'featured.store',
        'uses' => 'FeaturedController@store']);

    Route::delete('featured/{id}', [
        'as' => 'featured.destroy',
        'uses' => 'FeaturedController@destroy']);


//    Route::resource('featured', \App\Http\Controllers\Admin\FeaturedController::class)->except(['create', 'edit', 'show']);
    Route::post('featured/updateOrder', [\App\Http\Controllers\Admin\FeaturedController::class, 'updateOrder'])->name('featured.updateOrder');
});
