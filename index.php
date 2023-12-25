<?php

use CoffeeCode\Router\Router;

require_once(__DIR__."/vendor/autoload.php");

$router = new Router(URL_BASE);

$router->namespace("App\Core\Controller");

$router->get("/", "Pages\Home:render");

$router->dispatch();