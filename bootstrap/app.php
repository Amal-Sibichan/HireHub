<?php

use Illuminate\Foundation\Application;

use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Isloggedin;
use App\Http\Middleware\Emplogin;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'loggedin' => Isloggedin::class,
        ]);
        $middleware->alias([
            'emplogin' => Emplogin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
    })->create();
