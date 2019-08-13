<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/schools/events/create' ,    ////***Alessandra - delete this to send final version
        '/schools/events/',     ////***Alessandra - delete this to send final version
        '/dominos/setup/',
        '/dominos/stores/',
        '/login/',
        '/dominos/calendars/'     ////***Alessandra - delete this to send final version
    ];
}
