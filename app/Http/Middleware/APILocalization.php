<?php

namespace App\Http\Middleware;

use Closure;

class APILocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $langHeader = $request->header("Accept-Language");
        $locale = null !== $langHeader  ? $langHeader : 'en';
        app()->setLocale($locale);
        return $next($request);
    }
}
