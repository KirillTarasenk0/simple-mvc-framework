<?php

namespace App\Models;

use App\Models\PDOConnect;

class Customer extends PDOConnect
{
    public function getAll(): array
    {
        $customers = $this->pdo->query("SELECT * FROM customers");
        return $customers->fetchAll();
    }
}