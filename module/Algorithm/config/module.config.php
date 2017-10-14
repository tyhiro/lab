<?php
namespace Algorithm;

use Algorithm\Controller\AlgorithmController;
use Algorithm\Factory\AlgorithmControllerAbstractFactory;
use Algorithm\Factory\AlgorithmControllerFactory;
use Algorithm\Factory\AlgorithmServiceAbstractFactory;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'algorithm' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/algorithm',
                    'defaults' => [
                        'controller' => AlgorithmController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes'=>[
                    'sort'=>[
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/sort[/:action]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                            ],
                            'defaults' => [
                                'controller' => 'Algorithm\Controller\Sort',
                                'action' => 'index',
                            ],
                        ],
                    ]
                ]
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            AlgorithmController::class => AlgorithmControllerFactory::class
        ],
        'abstract_factories'=>[
            AlgorithmControllerAbstractFactory::class
        ]
    ],
    'service_manager' => [
        'abstract_factories'=>[
            AlgorithmServiceAbstractFactory::class
        ]
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'template_path_stack' => [
            'algorithm' => __DIR__ . '/../view',
        ],
    ]
];