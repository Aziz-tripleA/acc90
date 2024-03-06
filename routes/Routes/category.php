<?php
Route::group([
    'prefix' => 'category',
    'as' => 'category.',
], function () {

    Route::post('/', [
        'as'   => 'index',
        'uses' => 'CategoryController@index',
    ]);

});
