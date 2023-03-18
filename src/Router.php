<?php

namespace App;

class Router
{
    private $routes = [];

    public function addRoute($method, $route, $controllerName, $methodName): void
    {
        $this->routes[] = [$method, $route, $controllerName, $methodName];
    }

    public function handleRequest($method, $url): mixed
    {
        foreach ($this->routes as $route) {
            list($routeMethod, $routeUrl, $controllerName, $methodName) = $route;
            if ($method == $routeMethod && preg_match($routeUrl, $url, $matches)) {
                array_shift($matches);
                $controller = new $controllerName();
                return call_user_func_array([$controller, $methodName], $matches);
            }
        }
        header('HTTP/1.1 404 Not Found');
        die('404 Not Found');
    }
}
