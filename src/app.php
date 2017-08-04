<?php
use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();


$routes->add(
    'pattern',
    new Routing\Route(
        '/pattern',
        [
            'name'        => 'pattern',
            '_controller' => 'Pattern\\Controller\\PatternController::indexAction',
        ],
        [],
        [], // опции
        '', // хост
        [], // схемы
        ['GET'] // методы
    )
);
$routes->add(
    'pattern-observer',
    new Routing\Route(
        '/pattern/observer',
        [
            'name'        => 'pattern-observer',
            '_controller' => 'Pattern\\Controller\\PatternController::observerAction',
        ],
        [],
        [], // опции
        '', // хост
        [], // схемы
        ['GET'] // методы
    )
);
$routes->add(
    'pattern-strategy',
    new Routing\Route(
        '/pattern/strategy',
        [
            'name'        => 'pattern-strategy',
            '_controller' => 'Pattern\\Controller\\PatternController::strategyAction',
        ],
        [],
        [], // опции
        '', // хост
        [], // схемы
        ['GET'] // методы
    )
);

return $routes;
