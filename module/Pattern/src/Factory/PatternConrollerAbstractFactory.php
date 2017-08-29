<?php
namespace Pattern\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Pattern\Controller\PatternArticlesController;
use Pattern\Controller\PatternDefaultController;
use Pattern\Service\ArticleService;
use Pattern\Service\PizzaService;
use Pattern\Service\PizzaServiceInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

class PatternConrollerAbstractFactory implements AbstractFactoryInterface
{
    const REQUESTED_NAME_REGEXP = '/^Pattern\\\\Controller\\\\(?<name>.+)$/';

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $class = $this->requestedNameToClass($requestedName);

        if ($class == PatternDefaultController::class) {
            /** @var PizzaServiceInterface $pizzaService */
            $pizzaService = $container->get(PizzaService::class);
            return new PatternDefaultController($pizzaService);
        }

        if ($class == PatternArticlesController::class) {
            /** @var ArticleService $articleService */
            $articleService = $container->get(ArticleService::class);
            return new PatternArticlesController($articleService);
        }
    }

    /**
     * Can the factory create an instance for the service?
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @return bool
     */
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        $class = $this->requestedNameToClass($requestedName);
        return $class !== null && class_exists($class);
    }

    /**
     * @param $requestedName
     * @return string | null
     */
    protected function requestedNameToClass($requestedName)
    {
        // Example: Pattern\Controller\Articles
        // -> PatternArticlesController

        if (preg_match(self::REQUESTED_NAME_REGEXP, $requestedName, $m) == false) {
            return null;
        }

        return 'Pattern\Controller\Pattern' . $m['name'] . 'Controller';
    }
}
