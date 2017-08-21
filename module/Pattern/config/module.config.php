<?php
namespace Pattern;

use Pattern\Controller\PatternController;
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
            PatternController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'pattern' => __DIR__ . '/../view',
        ],
    ],

//    'view_manager' => [
//        'display_not_found_reason' => true,
//        'display_exceptions' => true,
//        'doctype' => 'HTML5',
//        //'not_found_template' => 'error/404',
//        //'exception_template' => 'error/index',
//        'template_map' => [
//            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
//            'error/404' => __DIR__ . '/../view/error/404.phtml',
//            'error/index' => __DIR__ . '/../view/error/index.phtml',
//        ],
//        'template_path_stack' => [
//            __DIR__ . '/../view',
//        ],
//    ],
];