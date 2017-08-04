<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\HttpCache\HttpCache;
use Symfony\Component\HttpKernel\HttpCache\Store;


$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new Simplex\GoogleListener());

$request = Request::createFromGlobals();
$routes = include __DIR__ . '/../src/app.php';

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);
$resolver = new ControllerResolver();
$framework = new Simplex\Framework($dispatcher, $matcher, $resolver, getenv('DEBUG_MODE'));
$framework = new HttpCache($framework, new Store(__DIR__ . '/../cache'));
$framework->handle($request)->send();
