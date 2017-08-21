<?php
return array (
  'service_manager' => 
  array (
    'aliases' => 
    array (
      'HttpRouter' => 'Zend\\Router\\Http\\TreeRouteStack',
      'router' => 'Zend\\Router\\RouteStackInterface',
      'Router' => 'Zend\\Router\\RouteStackInterface',
      'RoutePluginManager' => 'Zend\\Router\\RoutePluginManager',
      'ValidatorManager' => 'Zend\\Validator\\ValidatorPluginManager',
      'PizzaService' => 'Pattern\\Service\\PizzaService',
    ),
    'factories' => 
    array (
      'Zend\\Router\\Http\\TreeRouteStack' => 'Zend\\Router\\Http\\HttpRouterFactory',
      'Zend\\Router\\RoutePluginManager' => 'Zend\\Router\\RoutePluginManagerFactory',
      'Zend\\Router\\RouteStackInterface' => 'Zend\\Router\\RouterFactory',
      'Zend\\Validator\\ValidatorPluginManager' => 'Zend\\Validator\\ValidatorPluginManagerFactory',
      'Pattern\\Service\\PizzaService' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
    ),
  ),
  'route_manager' => 
  array (
  ),
  'router' => 
  array (
    'routes' => 
    array (
      'home' => 
      array (
        'type' => 'Zend\\Router\\Http\\Literal',
        'options' => 
        array (
          'route' => '/',
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\IndexController',
            'action' => 'index',
          ),
        ),
      ),
      'application' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/application[/:action]',
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\IndexController',
            'action' => 'index',
          ),
        ),
      ),
      'pattern' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/pattern[/:action]',
          'constraints' => 
          array (
            'pattern' => '[a-zA-Z][a-zA-Z0-9_-]*',
          ),
          'defaults' => 
          array (
            'controller' => 'Pattern\\Controller\\PatternController',
            'action' => 'index',
          ),
        ),
      ),
    ),
  ),
  'controllers' => 
  array (
    'factories' => 
    array (
      'Application\\Controller\\IndexController' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
      'Pattern\\Controller\\PatternController' => 'Pattern\\Factory\\PatternControllerFactory',
    ),
  ),
  'view_manager' => 
  array (
    'display_not_found_reason' => true,
    'display_exceptions' => true,
    'doctype' => 'HTML5',
    'not_found_template' => 'error/404',
    'exception_template' => 'error/index',
    'template_map' => 
    array (
      'layout/layout' => '/home/mntD/work/projects/tyhiro/html/module/Application/config/../view/layout/layout.phtml',
      'application/index/index' => '/home/mntD/work/projects/tyhiro/html/module/Application/config/../view/application/index/index.phtml',
      'error/404' => '/home/mntD/work/projects/tyhiro/html/module/Application/config/../view/error/404.phtml',
      'error/index' => '/home/mntD/work/projects/tyhiro/html/module/Application/config/../view/error/index.phtml',
    ),
    'template_path_stack' => 
    array (
      0 => '/home/mntD/work/projects/tyhiro/html/module/Application/config/../view',
      'pattern' => '/home/mntD/work/projects/tyhiro/html/module/Pattern/config/../view',
    ),
  ),
);