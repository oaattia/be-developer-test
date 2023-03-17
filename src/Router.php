<?php

namespace App;

class Router
{
    private $routes = [];

    public function addRoute(string $method, string $path, string $controllerMethod): void
    {
        $this->routes[$method][$path] = $controllerMethod;
    }

    public function handle(string $method, string $path): void
    {
        if (!isset($this->routes[$method])) {
            $this->notFound();
            return;
        }

        $controllerMethod = $this->routes[$method][$path] ?? null;

        if (!$controllerMethod) {
            $this->notFound();
            return;
        }

        [$controllerName, $methodName] = explode('@', $controllerMethod);

        if (!class_exists($controllerName)) {
            $this->notFound();
            return;
        }

        $controller = new $controllerName();

        if (!method_exists($controller, $methodName)) {
            $this->notFound();
            return;
        }

        $controller->$methodName();
    }

    private function notFound(): void
    {
        http_response_code(404);
        echo 'Page not found';
    }
}
