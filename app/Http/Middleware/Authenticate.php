<?php

namespace App\Http\Middleware;

use App\Helpers\ResponseFormatter;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $request->headers->set('Accept', 'application/json');

        return ResponseFormatter::error(
            401,
            'Unauthenticated'
        );
    }
}
