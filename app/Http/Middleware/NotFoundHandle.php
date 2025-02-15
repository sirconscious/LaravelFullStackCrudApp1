<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class NotFoundHandle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    { 
        dd($request) ;
        // try {
        //     return $next($request);
        // } catch (Throwable $e) {
        //     return response()->json([
        //         'error' => 'Something went wrong!',
        //         'message' => $e->getMessage(),
        //     ]);
        // }
    }
}
