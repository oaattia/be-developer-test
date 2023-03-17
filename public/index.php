<?php
use App\Router;

require __DIR__ . '/../vendor/autoload.php';

$router = new Router();

$router->addRoute('GET', '/', '\App\Controller\HomeController@index');

$router->handle($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
