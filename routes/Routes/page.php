<?php

Route::get('about-us', [
    'as'   => 'about',
    'uses' => 'PageController@about',
]);
Route::get('contact-us', [
    'as'   => 'contact',
    'uses' => 'PageController@contact',
]);
Route::get('donate', [
    'as'   => 'donate',
    'uses' => 'PageController@donate',
]);
