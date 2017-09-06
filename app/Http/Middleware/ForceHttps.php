<?php

namespace App\Http\Middleware;

use App;
use Closure;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $request->secure() && App::environment('production') && config('app.force_ssl')) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
