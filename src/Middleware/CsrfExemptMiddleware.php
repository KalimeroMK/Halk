<?php

namespace Kalimeromk\HalkbankPayment\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;

class CsrfExemptMiddleware extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'payment-success',
        'payment-fail',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     * @throws TokenMismatchException
     */
    public function handle($request, Closure $next): mixed
    {
        // Iterate through the $except array to see if the request URI matches any patterns
        foreach ($this->except as $route) {
            if ($request->is($route)) {
                return $next($request);
            }
        }

        // If none match, perform the regular CSRF check
        return parent::handle($request, $next);
    }
}