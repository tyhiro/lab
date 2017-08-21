<?php

namespace Pattern\Controller;

use Pattern\Service\PizzaServiceInterface;
use Pattern\Service\PizzaStore\NYPizzaStore;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class PatternController
 * @package Pattern\Controller
 */
class PatternController extends AbstractActionController
{
    /** @var  PizzaServiceInterface $pizzaService */
    protected $pizzaService;

    public function __construct(PizzaServiceInterface $pizzaService)
    {
        $this->pizzaService = $pizzaService;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }

    public function factoryAction()
    {
        $pizza = $this->pizzaService->orderPizza(new NYPizzaStore(), 'veggie');
        return new ViewModel(['pizza' => $pizza]);
    }
}
