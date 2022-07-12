<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;

class LangSwitcher {

    private $app;

    public function __construct(Application $app) {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     * Set local language
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $response=$next($request);
        if ($request->headers->has('lang')) {
            $this->app->setLocale($request->header('lang'));
        }
        $headers=[
            "Pragma" => "no-cache",
            "Expires" => "Fri, 01 Jan 1990 00:00:00 GMT",
            "Cache-Control" => "no-store,no-cache, must-revalidate, , max-age=0",
        ];
        foreach ($headers as $headerKey=>$headerVal){
            $response->headers->set($headerKey,$headerVal);
        }
        return $response;
    }
}
