<?php
use App\Router;

require __DIR__ . '/../vendor/autoload.php';

$router = new Router();

// Add a route for GET requests to /sample.jpg/crop/x/12/y/12/w/2/h/2
$router->addRoute('GET', '/^\/(.*\.\w+)\/crop\/x\/(\d+)\/y\/(\d+)\/w\/(\d+)\/h\/(\d+)$/', '\App\Controller\ImageController', 'crop');

$router->handleRequest($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
