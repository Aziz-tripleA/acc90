<?php
Route::group([
    'prefix' => 'admin/askforhelp',
    'as' => 'askhelp.admin.',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'AskHelpController@index',
    ]);

    Route::get('{askHelp}', [
        'as'   => 'show',
        'uses' => 'AskHelpController@show',
    ]);
});

Route::group([
    'prefix' => 'request-counseling-session',
    'as' => 'askhelp.',
], function () {
    Route::get('/', [
        'as' => 'create',
        'uses' => 'AskHelpController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'AskHelpController@store',
    ]);

    Route::get('/{askHelp}/step-2', [
        'as' => 'edit',
        'uses' => 'AskHelpController@edit',
    ]);

    Route::patch('update/{askHelp}', [
        'as' => 'update',
        'uses' => 'AskHelpController@update',
    ]);

    Route::get('print/{askHelp}', [
        'as' => 'print',
        'uses' => 'AskHelpController@print',
    ]);

    Route::get('confirm', [
        'as' => 'confirm',
        'uses' => 'AskHelpController@confirm',
    ]);

});
