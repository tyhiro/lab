<?php
namespace Pattern\Service;

use Pattern\Model\PizzaInterface;
use Pattern\Service\PizzaStore\PizzaStoreInterface;

interface PizzaServiceInterface
{
    /**
     * @param PizzaStoreInterface $pizzaStore
     * @param $type
     * @throws \RuntimeException
     * @return PizzaInterface
     */
    public function orderPizza(PizzaStoreInterface $pizzaStore, $type);
}