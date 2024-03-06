<?php
Route::group([
    'prefix' => 'admin/courses',
    'as' => 'course.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerCourseController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerCourseController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerCourseController@store',
    ]);

    Route::get('edit/{course}', [
        'as' => 'edit',
        'uses' => 'ManagerCourseController@edit',
    ]);

    Route::patch('update/{course}', [
        'as' => 'update',
        'uses' => 'ManagerCourseController@update',
    ]);

    Route::delete('destroy/{course}', [
        'as' => 'destroy',
        'uses' => 'ManagerCourseController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerCourseController@deleteAll',
    ]);

});
Route::group([
    'prefix' => 'admin',
    'as' => 'courseTopics.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {
    Route::get('course-topics', [
        'as'   => 'index',
        'uses' => 'ManagerArticlesTopicsController@courseTopics',
    ]);
});
Route::group([
    'prefix' => 'learning-materials',
    'as' => 'course.',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'CourseController@index',
    ]);

    Route::get('{course}', [
        'as'   => 'show',
        'uses' => 'CourseController@show',
    ]);
});
