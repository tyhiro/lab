<?php

namespace Pattern\Service;

use Pattern\Model\PizzaInterface;
use Pattern\Service\PizzaStore\PizzaStoreInterface;

class PizzaService implements PizzaServiceInterface
{
    /**
     * @param PizzaStoreInterface $pizzaStore
     * @param $type
     * @throws \RuntimeException
     * @return PizzaInterface
     */
    public function orderPizza(PizzaStoreInterface $pizzaStore, $type)
    {
        if (!$pizzaStore instanceof PizzaStoreInterface) {
            throw new \RuntimeException('Не выбран магазин');
        }

        return $pizzaStore->orderPizza($type);
    }
}