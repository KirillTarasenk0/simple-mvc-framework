<?php

namespace Router;

class Router
{
    private string $requestUri;
    private array $routes;
    public function __construct()
    {
        echo $_SERVER['HTTP_HOST'] . "<br>";
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->routes = require_once 'routes.php';
        echo $this->requestUri . '<br>';
        print_r($this->routes);
    }
}