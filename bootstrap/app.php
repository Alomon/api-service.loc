<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        apiPrefix: "api",
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //Обработка исключений если объект не найден при использовании имплицитного связывания моделей (route model binding)
        //   \Illuminate\Database\Eloquent\ModelNotFoundException
        $exceptions->render(function (Throwable $e, $request) {
            return (new \App\Exceptions\Api\ApiException("Not Found", 404))->getResponse();
        });
    })->create();
