<?php

namespace App\Models;

use App\Models\PDOConnect;
use Router\Router;

class Customer extends PDOConnect
{
    public function getAll(): array
    {
        $customers = $this->pdo->query("SELECT * FROM customers");
        return $customers->fetchAll();
    }
    public function getCustomersByNumber(): array
    {
        $customerNumber = Router::$requestUriParam;
        $customers = $this->pdo->query("SELECT * FROM customers WHERE customerNumber = {$customerNumber}");
        return $customers->fetchAll();
    }
}