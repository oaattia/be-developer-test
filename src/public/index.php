<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Router;

$router = new Router();

$router->addRoute('GET', '/', '\App\HomeController@index');

$router->handle($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
