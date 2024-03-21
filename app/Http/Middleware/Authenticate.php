<?php

namespace App\Http\Middleware;

use App\libs\Response\GlobalApiResponse;
use App\libs\Response\GlobalApiResponseCodeBook;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
//    protected function redirectTo($request)
//    {
//        if (!$request->expectsJson()) {
//            if($request->is('portal') || $request->is('portal/*')) {
//                return route('portal.auth.login');
//            } else {
//                return route('login');
//            }
//        }
//
//        return route('login');
//    }

    public function handle($request, Closure $next, ...$guards)
    {
        if ($this->authenticate($request, $guards) === 'authentication_failed') {
            $error = (new GlobalApiResponse())->error(GlobalApiResponseCodeBook::NOT_AUTHORIZED,'Unauthorized');
            return response()->json($error);
        }
        return $next($request);
    }

    // Override authentication method
    protected function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }
        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }
        return 'authentication_failed';
    }
}
