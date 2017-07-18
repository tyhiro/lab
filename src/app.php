<?php
// framework/src/app.php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('pattern', new Routing\Route('/pattern/{pattern}', array('pattern' => 'observer')));
$routes->add('index', new Routing\Route('/'));

return $routes;