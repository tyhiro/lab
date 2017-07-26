<?php

// framework/tests/Simplex/Tests/FrameworkTest.php

namespace Simplex\Tests;

use Simplex\Framework;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class FrameworkTest extends \PHPUnit_Framework_TestCase
{

    public function testNotFoundHandling()
    {
        $framework = $this->getFrameworkForException(new ResourceNotFoundException());

        $response = $framework->handle(new Request());

        self::assertEquals(404, $response->getStatusCode());
    }

    protected function getFrameworkForException($exception)
    {
        $matcher = $this
            ->getMockBuilder('Symfony\Component\Routing\Matcher\UrlMatcherInterface')
            ->getMock();

        $matcher
            ->expects(self::once())
            ->method('match')
            ->will(self::throwException($exception));

        $resolver = $this
            ->getMockBuilder('Symfony\Component\HttpKernel\Controller\ControllerResolverInterface')
            ->getMock();

        return new Framework($matcher, $resolver);
    }

    public function testControllerResponse()
    {
        $matcher = $this
            ->getMockBuilder('Symfony\Component\Routing\Matcher\UrlMatcherInterface')
            ->getMock();

        $matcher
            ->expects(self::once())
            ->method('match')
            ->will(self::returnValue([
                '_route'      => 'foo',
                'name'        => 'Fabien',
                '_controller' => function ($name) {
                    return new Response('Hello ' . $name);
                }
            ]));
        $resolver = new ControllerResolver();

        $framework = new Framework($matcher, $resolver);

        $response = $framework->handle(new Request());

        self::assertEquals(200, $response->getStatusCode());
        self::assertContains('Hello Fabien', $response->getContent());
    }

    public function testErrorHandling()
    {
        $framework = $this->getFrameworkForException(new \RuntimeException());

        $response = $framework->handle(new Request());

        self::assertEquals(500, $response->getStatusCode());
    }
}
