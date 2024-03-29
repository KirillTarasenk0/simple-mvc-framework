<?php

namespace App\Controllers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class HomeController
{
    public function index(): void
    {
        $loader = new FilesystemLoader(ROOT_DIR . '/../app/Views');
        $twig = new Environment($loader);
        echo $twig->render('homePage.twig');
    }
}