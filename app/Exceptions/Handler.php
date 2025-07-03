<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    // ... existing code (don't remove anything)

    /**
     * Handle unauthenticated user access to protected routes.
     */
    protected function unauthenticated($request, AuthenticationException $exception)
{
    if ($request->expectsJson()) {
        return response()->json(['message' => $exception->getMessage()], 401);
    }

    // Check which guard failed
    $guard = data_get($exception->guards(), 0);

    switch ($guard) {
        case 'admin':
            $login = route('admin.login');
            break;

        case 'customer':
            $login = route('customer.login');
            break;

        default:
            $login = '/'; // fallback to home or some default
            break;
    }

    return redirect()->guest($login);
}
}
