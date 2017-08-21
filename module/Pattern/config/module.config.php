<?php
namespace Pattern;

use Pattern\Controller\PatternController;
use Pattern\Service\PizzaService;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'pattern' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/pattern[/:action]',
                    'constraints' => [
                        'pattern' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ],
                    'defaults' => [
                        'controller' => PatternController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            PatternController::class => Factory\PatternControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'PizzaService' => PizzaService::class,
        ],
        'factories' => [
            PizzaService::class => InvokableFactory::class,
        ],
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'template_path_stack' => [
            'pattern' => __DIR__ . '/../view',
        ],
    ]
];