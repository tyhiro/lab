<?php
namespace Pattern\Service\PizzaStore;

abstract class AbstractPizzaStore implements PizzaStoreInterface
{
    /**
     * {@inheritdoc}
     */
    public function orderPizza($type)
    {
        $pizza = $this->createPizza($type);
        $pizza->prepare();
        $pizza->bake();
        $pizza->cut();
        $pizza->box();
        return $pizza;
    }

    /**
     * {@inheritdoc}
     */
    abstract function createPizza($type);
}