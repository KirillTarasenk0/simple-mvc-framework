<?php

namespace Router;

class Router
{
    private string $requestUri;
    private array $routes;
    private int $requestUriParam;
    public function __construct()
    {
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->routes = require_once 'routes.php';
    }
    public function findController(): ?string
    {
        $controllerName = null;
        foreach ($this->routes as $route => $action) {
            $this->findRequestUriParam();
            if ($route === $this->requestUri) {
                $controllerName = $action['controller'];
                $controller = new $controllerName();
                $action = $action['action'];
                $controller->$action();
                return $controllerName;
            }
        }
        echo "<h1>Page is not found.</h1>";
        return $controllerName;
    }
    private function findRequestUriParam(): void
    {
        if (preg_match('/[0-9]+/', $this->requestUri, $matches)) {
            $this->requestUriParam = $matches[0];
            $this->requestUri = str_replace("/{$this->requestUriParam}", '', $this->requestUri);
        }
    }
}