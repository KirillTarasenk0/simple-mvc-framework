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
        $customer = new Customer();
        $allCustomersData = $customer->getAll();
        $customersByNumber = $customer->getCustomersByNumber();
        if (isset($_POST['sendBtn'])) {
            $customer->insertCustomer();
        }
        echo $twig->render('customersPage.twig', [
            'customerInfo' => $allCustomersData,
            'customersByNumber' => $customersByNumber,
        ]);
    }
}