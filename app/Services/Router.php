<?php

namespace App\Services;


class Router
{
    private static $routes = [];
    private static $controllerNameSpace = 'App\Controller\\';

    public static function getRoutes($uri, $controller, $action, $method, $middleware = [] )
    {

        self::$routes[] = [
            'uri' => '/' . $uri,
            'controller' => $controller,
            'action' => $action,
            'method' => $method,
            'middleware' => $middleware
        ];
    }

    static function get($uri, $controller, $action,$middleware = [] )
    {
        self::getRoutes($uri, $controller, $action, 'GET', $middleware);
    }
    static function post($uri, $controller, $action, $middleware = [] )
    {
        self::getRoutes($uri, $controller, $action, 'POST', $middleware);
    }


    //get corrent URI
    public function cleanURI()
    {
        $requestURI = $_SERVER['REQUEST_URI'];
        $URI = str_replace('/php/GitHub/Blog', '', $requestURI);
        $URI = explode('?', $URI);
        $cleanURI = $URI[0];
        return $cleanURI;
    }

    function routeHandler()
    {
        $cleanURI = $this->cleanURI(); //This function return Correct URI
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        foreach (self::$routes as $route) {
            if ($route['uri'] === $cleanURI && $route['method'] == $requestMethod) {
                foreach ($route['middleware'] as $middleware) {
                    $middlewareClass = new $middleware;
                    $middlewareClass->handle();
                }

                $cotrollerClass = self::$controllerNameSpace . $route['controller'];
                $action = $route['action'];
                $controller = new $cotrollerClass();
                $controller->$action();
                return;
            }
        }
        view("error", "404");
    }
}
