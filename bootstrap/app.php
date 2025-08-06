<?php

use App\Http\Middleware\authentificationadmin;
use App\Http\Middleware\authentificationwarga;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('admin', authentificationadmin::class);
        $middleware->appendToGroup('warga', authentificationwarga::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
