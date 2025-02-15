<?php

use App\Http\Middleware\HandleExceptions;
use App\Http\Middleware\NotFoundHandle;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
            // $middleware->api(prepend : [
            //     NotFoundHandle::class
            // ]) ;
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->expectsJson()) {
                return new JsonResponse([
                    'error' => 'Resource not found',
                    'message' => 'The requested resource could not be found.'
                ], 404);
            }
        });
    })
    ->create();
