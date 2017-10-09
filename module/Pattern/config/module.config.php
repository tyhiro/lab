<?php
namespace Pattern;

use Pattern\Factory\PatternConrollerAbstractFactory;
use Pattern\Service\ArticleService;
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
                        'controller' => 'Pattern\Controller\Default',
                        'action' => 'index',
                    ],
                ],
            ],
            'articles' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/articles[/:action]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'page' => '[0-9]+',
                        'orderby' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'orderdir' => 'asc|desc',
                    ],
                    'defaults' => [
                        'controller' => 'Pattern\Controller\Articles',
                        'action' => 'index',
                        'page' => 1,
                    ],
                ]
            ],
        ],
    ],
    'controllers' => [
        'abstract_factories'=>[
            PatternConrollerAbstractFactory::class
        ]
    ],
    'service_manager' => [
        'aliases' => [
            'PizzaService' => PizzaService::class,
        ],
        'factories' => [
            PizzaService::class => InvokableFactory::class,
            ArticleService::class => InvokableFactory::class,
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