<?php
Route::group([
    'prefix' => 'admin/articles',
    'as' => 'article.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerArticleController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerArticleController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerArticleController@store',
    ]);

    Route::get('edit/{article}', [
        'as' => 'edit',
        'uses' => 'ManagerArticleController@edit',
    ]);

    Route::patch('update/{article}', [
        'as' => 'update',
        'uses' => 'ManagerArticleController@update',
    ]);

    Route::delete('destroy/{article}', [
        'as' => 'destroy',
        'uses' => 'ManagerArticleController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerArticleController@deleteAll',
    ]);

});
Route::group([
            'prefix' => 'admin',
            'as' => 'articleTopics.admin.',
            'namespace' => 'Admin',
            'middleware' => 'manager_access',
        ], function () {
        Route::get('article-topics', [
            'as'   => 'index',
            'uses' => 'ManagerArticlesTopicsController@index',
        ]);
    });

Route::group([
    'prefix' => 'articles',
    'as' => 'article.',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ArticleController@index',
    ]);

    Route::get('{article}', [
        'as'   => 'show',
        'uses' => 'ArticleController@show',
    ]);
});
