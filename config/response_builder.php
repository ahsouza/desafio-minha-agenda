<?php


use App\Api;

return [
    /*
    |-----------------------------------------------------------------------------------------------------------
    | Code range settings
    |-----------------------------------------------------------------------------------------------------------
    */
    'min_code'          => 100,
    'max_code'          => 1024,

    /*
    |-----------------------------------------------------------------------------------------------------------
    | Error code to message mapping
    |-----------------------------------------------------------------------------------------------------------
    |
    */
    'map'               => [
        Api::SOMETHING_WENT_WRONG => 'api.something_went_wrong',
        Api::INVALID_CREDENTIALS => 'api.invalid_credentials',
        Api::VALIDATION_ERROR => 'api.validation_error',
        Api::INVALID_EMAIL_VERIFICATION_URL => 'api.invalid_email_verification_url',
        Api::EMAIL_ALREADY_VERIFIED => 'api.email_already_verified',
    ],

];