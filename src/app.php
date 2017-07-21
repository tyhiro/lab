<?php
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();


$routes->add(
    'pattern',
    new Routing\Route(
        '/pattern/{pattern}',
        [
            'name'        => 'pattern',
            '_controller' => 'Pattern\\Controller\\PatternController::indexAction',
            'pattern'     => 'index'
        ],
        [
            'pattern' => "(index|observer|strategy)"
        ],
        [], // опции
        '', // хост
        [], // схемы
        ['GET'] // методы
    )
);

return $routes;
