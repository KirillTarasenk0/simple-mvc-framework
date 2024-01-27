<?php

use App\Controllers\CustomersController;
use App\Controllers\HomeController;
use Router\Http\DynamicUriParameter;

$parameter = new DynamicUriParameter();

return [
    '/' => ['controller' => HomeController::class, 'action' => 'index'],
    '/customer' => ['controller' => CustomersController::class, 'action' => 'index'],
    "/customer/{$parameter->getRequestUriParam()}" => ['controller' => CustomersController::class, 'action' => 'numberedCustomer']
];