<?php

use App\Controllers\CustomersController;
use App\Controllers\HomeController;

return [
    '/' => ['controller' => HomeController::class, 'action' => 'index'],
    '/customer' => ['controller' => CustomersController::class, 'action' => 'index']
];