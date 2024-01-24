<?php

namespace App\Models;

use PDO;
use PDOException;

abstract class PDOConnect
{
    protected PDO $pdo;
    public function __construct()
    {
        $dbname = 'lamp';
        $dbuser = 'lamp';
        $dbpass = 'lamp';
        try {
            $this->pdo = new PDO("mysql:host=database;port=3306;dbname=$dbname", $dbuser, $dbpass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}