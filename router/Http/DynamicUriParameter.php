<?php

namespace Router\Http;

class DynamicUriParameter
{
    private string $requestUri;
    public int $requestUriParam = 0;
    public function __construct()
    {
        $this->requestUri = $_SERVER['REQUEST_URI'];
        if (preg_match('/[0-9]+/', $this->requestUri, $matches)) {
            $this->requestUriParam = $matches[0];
            $this->requestUri = str_replace("/{$matches[0]}", '', $this->requestUri);
        }
    }
    public function getRequestUriParam(): int
    {
        return $this->requestUriParam;
    }
}