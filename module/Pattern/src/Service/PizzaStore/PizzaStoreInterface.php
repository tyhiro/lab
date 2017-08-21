<?php
namespace Pattern\Service\PizzaStore;

use Pattern\Model\PizzaInterface;

interface PizzaStoreInterface
{
    /**
     * @param string $type
     * @return PizzaInterface
     */
    public function orderPizza($type);

    /**
     * @param string $type
     * @return null| PizzaInterface
     */
    public function createPizza($type);
}