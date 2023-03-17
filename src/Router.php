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
                array_shift($matches); // remove the full match from the array
                $controller = new $controllerName();
                return call_user_func_array([$controller, $methodName], $matches);
            }
        }
        // If no matching route was found, return a 404 error
        header('HTTP/1.1 404 Not Found');
        die('404 Not Found');
    }
}
