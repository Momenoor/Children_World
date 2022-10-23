<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyRoleRedirect
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

        if (!$this->isRouteInCorrectPrefix()) {

            $uri = $this->getCorrectRouteAfterPrefixChecked();

            return redirect()->to($uri);
        }
        return $next($request);
    }

    protected function isRouteInCorrectPrefix()
    {
        return request()->route()->getPrefix() ==  Auth::user()->role_key;
    }

    protected function getCorrectRouteAfterPrefixChecked()
    {
        $requestRoute = request()->route();
        $newPrefix = Auth::user()->role_key;
        $removedPrefix = trim(
            str_replace(
                ltrim($requestRoute->getPrefix(), '/'),
                $newPrefix,
                $requestRoute->uri()
            ),
            '.'
        );
        return $removedPrefix;
    }
}
