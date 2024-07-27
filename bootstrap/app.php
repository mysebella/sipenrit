<?php

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isUserAuth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        api: __DIR__ . '/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isUserAuth' => isUserAuth::class,
            'isAdmin' => isAdmin::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
