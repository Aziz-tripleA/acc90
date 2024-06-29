<?php

Route::group([
    'prefix' => 'admin/aboutconfigs',
    'as' => 'about.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',

], function () {
    Route::get('', [
        'as' => 'index',
        'uses' => 'AboutConfigsController@index',
    ]);
    Route::get('terms-conditions', [
        'as' => 'edit',
        'uses' => 'AboutConfigsController@edit',
    ]);
    Route::patch('update', [
        'as' => 'update',
        'uses' => 'AboutConfigsController@update',
    ]);
});
Route::get('servants', [\App\Http\Controllers\Admin\AboutConfigsController::class, 'servants'])->name('servants');
