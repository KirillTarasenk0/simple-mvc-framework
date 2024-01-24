<?php

namespace Router;

class Router
{
    private string $requestUri;
    private array $routes;
    public function __construct()
    {
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->routes = require_once 'routes.php';
    }
    public function findController(): ?string
    {
        $controllerName = null;
        foreach ($this->routes as $route => $action) {
            if ($route === $this->requestUri) {
                $controllerName = $action['controller'];
                $controller = new $controllerName();
                $action = $action['action'];
                $controller->$action();
            } else {
                echo 'URL not found';
            }
        }
        return $controllerName;
    }
}