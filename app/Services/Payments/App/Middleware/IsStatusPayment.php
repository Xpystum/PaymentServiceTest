<?php

namespace App\Services\Payments\App\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsStatusPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //если статус не Pending
        $payment = $request->route('payment');
        abort_unless($payment->status->isPending(), 404);

        return $next($request);
    }
}
