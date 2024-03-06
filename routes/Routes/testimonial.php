<?php
Route::group([
    'prefix' => 'admin/testimonials',
    'as' => 'testimonial.admin.',
    'namespace' => 'Admin',
    'middleware' => 'manager_access',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'ManagerTestimonialController@index',
    ]);
    Route::get('create', [
        'as' => 'create',
        'uses' => 'ManagerTestimonialController@create',
    ]);

    Route::post('/', [
        'as' => 'store',
        'uses' => 'ManagerTestimonialController@store',
    ]);

    Route::get('edit/{testimonial}', [
        'as' => 'edit',
        'uses' => 'ManagerTestimonialController@edit',
    ]);

    Route::patch('update/{testimonial}', [
        'as' => 'update',
        'uses' => 'ManagerTestimonialController@update',
    ]);

    Route::delete('destroy/{testimonial}', [
        'as' => 'destroy',
        'uses' => 'ManagerTestimonialController@destroy',
    ]);
    Route::delete('bulkDelete', [
        'as' => 'deleteAll',
        'uses' => 'ManagerTestimonialController@deleteAll',
    ]);

});
Route::group([
    'prefix' => 'living-testimony',
    'as' => 'testimonial.',
], function () {

    Route::get('/', [
        'as'   => 'index',
        'uses' => 'TestimonialController@index',
    ]);
});
