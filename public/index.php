<?php
use App\Router;

require __DIR__ . '/../vendor/autoload.php';

$router = new Router();

// GET request `/sample.jpg/crop/x/12/y/12/w/2/h/2`
$router->addRoute('GET', '/^\/(.*\.\w+)\/crop\/x\/(\d+)\/y\/(\d+)\/w\/(\d+)\/h\/(\d+)$/', '\App\Controller\ImageController', 'crop');

$router->addRoute('GET', '/^\/(.*\.\w+)\/resize\/w\/(\d+)\/h\/(\d+)$/', '\App\Controller\ImageController', 'resize');

// GET request for `/sample.jpg`
$router->addRoute('GET', '/^\/(.*\.\w+)$/', '\App\Controller\ImageController', 'index');

$router->handleRequest($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
