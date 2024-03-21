<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin' , '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application','ip');
        return $response;
    }

//    public function handle($request, Closure $next) {
//        $response = $next($request);
//        $response->headers->set('Access-Control-Allow-Origin' , '*');
//        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
//        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application','ip');
//        return $response;
//
////        $allowedOrigins = [env('LIVE_FORNTEND_ENDPOINT', 'http://localhost:8080'), env('LIVE_ADMIN_ENDPOINT', 'https://localhost:8008')];
////
////        if($request->server('HTTP_ORIGIN')){
////            if (in_array($request->server('HTTP_ORIGIN'), $allowedOrigins)) {
////                return $next($request)
////                    ->header('Access-Control-Allow-Origin', $request->server('HTTP_ORIGIN'))
////                    ->header('Access-Control-Allow-Origin', '*')
////                    ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
////                    ->header('Access-Control-Allow-Headers', '*');
////            }
//        //       }
////        return $next($request);
//
//    }
}
