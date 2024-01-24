<?php

require_once '../vendor/autoload.php';

use Router\Router;

const ROOT_DIR = __DIR__;

$router = new Router();
$router->findController();