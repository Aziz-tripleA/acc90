<?php

Route::group([
    'prefix' => 'status',
    'as' => 'status.',
], function () {

//    Route::get('/', [
//        'as'   => 'index',
//        'uses' => 'StatusController@index',
//    ]);
    Route::post('/', [
        'as'   => 'store',
        'uses' => 'StatusController@store',
    ]);

});
