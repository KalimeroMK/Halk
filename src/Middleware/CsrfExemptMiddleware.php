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
    protected $except;

    /**
     * Create a new middleware instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->except = config('csrf_exempt.exempt_uris', []);
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     * @throws TokenMismatchException
     */
    public function handle($request, Closure $next)
    {
        // Check if the request URI matches any patterns in the $except array
        foreach ($this->except as $route) {
            if ($request->is($route)) {
                // If a match is found, bypass CSRF verification
                return $next($request);
            }
        }

        // If no match is found, perform the regular CSRF check
        return parent::handle($request, $next);
    }
}
