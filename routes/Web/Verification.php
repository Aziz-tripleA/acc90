<?php

Route::group([
    'prefix'     => 'user',
    'as'         => 'verification.',
    'namespace'  => 'Auth\Web',
], function () {
    /* --------------------------------- email --------------------------------- */
    Route::get('verify', [
        'uses' => 'VerificationController@show',
        'as'   => 'notice',
    ]);

    Route::get('email/verify/{id}', [
        'uses' => 'VerificationController@verify',
        'as'   => 'verify',
    ]);

    Route::get('email/resend', [
        'uses' => 'VerificationController@resend',
        'as'   => 'resend',
    ]);

    /* --------------------------------- mobile --------------------------------- */
    Route::post('mobile/verify', [
        'uses' => 'VerificationController@verifyMobile',
        'as'   => 'notice.mobile',
    ]);

    Route::patch('mobile/resend/{id}', [
        'uses' => 'VerificationController@resendMobileVerificationCode',
        'as'   => 'resend.mobile',
    ]);
});
