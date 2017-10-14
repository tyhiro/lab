<?php
namespace Algorithm\Factory;

use Algorithm\Controller\AlgorithmSortController;
use Algorithm\Service\SortService;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

class AlgorithmControllerAbstractFactory implements AbstractFactoryInterface
{
    const REQUESTED_NAME_REGEXP = '/^Algorithm\\\\Controller\\\\(?<name>.+)$/';

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

        if ($class == AlgorithmSortController::class) {
            /** @var SortService $sortService */
            $sortService = $container->get(SortService::class);
            return new AlgorithmSortController($sortService);
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
        // Example: Algorithm\Controller\Sort
        // -> AlgorithmSortController

        if (preg_match(self::REQUESTED_NAME_REGEXP, $requestedName, $m) == false) {
            return null;
        }

        return 'Algorithm\Controller\Algorithm' . $m['name'] . 'Controller';
    }
}
