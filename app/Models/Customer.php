<?php

namespace App\Models;

use App\Models\PDOConnect;
use Router\Http\DynamicUriParameter;

class Customer extends PDOConnect
{
    public function getAll(): array
    {
        $customers = $this->pdo->query("SELECT * FROM customers");
        return $customers->fetchAll();
    }
    public function getCustomersByNumber(): array
    {
        $dynamicUriParameter = new DynamicUriParameter();
        $customerNumber = $dynamicUriParameter->getRequestUriParam();
        $customers = $this->pdo->query("SELECT * FROM customers WHERE customerNumber = {$customerNumber}");
        return $customers->fetchAll();
    }
    public function insertCustomer(): void
    {
        $insertQuery = $_POST['insertCustomer'];
        //INSERT INTO `customers` (`customerNumber`, `customerName`, `contactLastName`, `contactFirstName`, `phone`, `addressLine1`, `addressLine2`, `city`, `state`, `postalCode`, `country`, `creditLimit`) VALUES (10, 'Kirill Tarasenko', 'Tarasenko', 'Kirill', '+375447967653', 'Lenina', 'Level 10', 'Minsk', 'BY', 123, 'Belarus', 2000)
        try {
            $this->pdo->prepare($insertQuery)->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }
}