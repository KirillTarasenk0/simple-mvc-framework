<?php

namespace App\Views\loader;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class ViewLoader
{
    private FilesystemLoader $loader;
    private Environment $twig;
    public function loadTwig(): Environment
    {
        $this->loader = new FilesystemLoader(ROOT_DIR . '/../app/Views');
        $this->twig = new Environment($this->loader);
        return $this->twig;
    }
}