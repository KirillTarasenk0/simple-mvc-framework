<?php

namespace App\Controllers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use App\Models\Customer;

class CustomersController
{
    public function index(): void
    {
        $loader = new FilesystemLoader(ROOT_DIR . '/../app/Views');
        $twig = new Environment($loader);
        $pdo = new Customer();
        echo $twig->render('customersPage.twig');
    }
}