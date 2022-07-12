<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiDocumentation;

class ApiDocumentationController extends Controller {
    
    public function index(){
        $ApiDocumentation = ApiDocumentation::all();
        return view('api_documentation', compact('ApiDocumentation'));
    }
    
    /**
     * Generate API documentation for All 
     */
    public function generateDocumentation() {
        $routeCollection = collect(Route::getRoutes())->reduce(function ($carry = [], $route) {
            !preg_match('/^\/?api/', $route->uri()) ?: $carry[] = ['url' => $route->uri(), 'method' => $route->methods];
            return $carry;
        });

        foreach ($routeCollection as $routeCollectionItem) {
            $api_documentation = new \App\ApiDocumentation();
            $api_documentation->url = $routeCollectionItem['url'];
            $api_documentation->method_type = json_encode($routeCollectionItem['method']);
            if ($routeCollectionItem['method'][0] == 'GET') {
                $result = preg_match('/{id}|{module_id}|{token}/', $routeCollectionItem['url'], $matches);
                if ($matches) {
                    $api_documentation->parameters = json_encode($matches);
                } else {
                    $api_documentation->parameters = '{}';
                }
            } else {
                $api_documentation->parameters = '{}';
            }
            $api_documentation->description = '';
            $api_documentation->save();
        }
    }

}
