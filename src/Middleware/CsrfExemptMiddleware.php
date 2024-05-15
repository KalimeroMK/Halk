<?php

namespace Kalimeromk\HalkbankPayment\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;

class CsrfExemptMiddleware extends BaseVerifier
{
    /**
     * Create a new middleware instance.
     *
     * @param  Application  $app
     * @param  Encrypter  $encrypter
     */
    public function __construct(Application $app, Encrypter $encrypter)
    {
        parent::__construct($app, $encrypter);

        // Load your custom URIs from configuration
        $this->except = config('payment.exempt_uris', []);
    }

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
