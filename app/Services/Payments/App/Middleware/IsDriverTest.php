<?php

namespace App\Services\Payments\App\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsDriverTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //если драйвер Test
        $payment = $request->route('payment'); #TODO Возможно ошибкуа
        abort_unless($payment->driver->isTest(), 404);

        return $next($request);
    }
}
