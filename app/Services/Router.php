<?php

namespace App\Services;

use App\Controller\Auth;

class Router
{
    private static $routes = [];
    private static $controllerNameSpace = 'App\Controller\\';

    public static function getRoutes($uri, $controller, $action, $method = 'GET')
    {

        self::$routes[] = [
            'uri' => '/' . $uri,
            'controller' => $controller,
            'action' => $action,
            'method' => $method
        ];
    }

    static function get($uri, $controller, $action)
    {
        self::getRoutes($uri, $controller, $action, 'GET');
    }
    static function post($uri, $controller, $action)
    {
        self::getRoutes($uri, $controller, $action, 'POST');
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
                $auth = new Auth();
                $cotrollerClass = self::$controllerNameSpace . $route['controller'];
                $action = $route['action'];
                $controller = new $cotrollerClass();
                if ($cleanURI == '/login' or $cleanURI == '/login-submit') {
                    $controller->$action();
                    return;
                } else {
                    if ($auth->auth()) {
                        $controller->$action();
                        return;
                    } else {
                        redirect('login');
                    }
                }
            }
        }
        view("error", "404");
    }
}
