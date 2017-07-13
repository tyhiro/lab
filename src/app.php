<?php
// framework/src/app.php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
$routes->add('index', new Routing\Route('/'));

return $routes;