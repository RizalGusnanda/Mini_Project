<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        "*",
        // // link Ngrok mu 
        // 'https://5d0d-125-166-2-179.ngrok-free.app/callback',
        'callback',
    ];
}
