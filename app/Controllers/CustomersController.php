<?php

namespace App\Controllers;

use App\Models\Customer;
use App\Views\loader\ViewLoader;

class CustomersController
{
    private Customer $customer;
    private ViewLoader $viewLoader;
    public function __construct()
    {
        $this->customer = new Customer();
        $this->viewLoader = new ViewLoader();
    }
    public function index(): void
    {
        $allCustomersData = $this->customer->getAll();
        if (isset($_POST['sendBtn'])) {
            $this->customer->insertCustomer();
        }
        echo $this->viewLoader->loadTwig()->render('customersPage.twig', [
            'customerInfo' => $allCustomersData,
        ]);
    }
    public function numberedCustomer(): void
    {
        $numberedCustomer = $this->customer->getCustomersByNumber();
        echo $this->viewLoader->loadTwig()->render('customersPage.twig', [
            'customersByNumber' => $numberedCustomer,
        ]);
    }
}