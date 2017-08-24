<?php
namespace Pattern\Service\PizzaStore;

use Pattern\Model\Pizza\CheesePizza;
use Pattern\Model\Pizza\Ingredients\ChicagoPizzaIngredientFactory;
use Pattern\Model\Pizza\PepperoniPizza;
use Pattern\Model\Pizza\VeggiePizza;

/**
 * Class ChicagoPizzaStore
 * @package Pattern\Service\PizzaStore
 */
class ChicagoPizzaStore extends AbstractPizzaStore
{
    /**
     * {@inheritdoc}
     */
    function createPizza($type)
    {
        $pizza = null;
        $pizzaIngredientFactory = new ChicagoPizzaIngredientFactory();
        switch ($type) {
            case 'cheese':
                $pizza = new CheesePizza($pizzaIngredientFactory);
                $pizza->setName('ChicagoCheesePizza');
                break;
            case 'pepperoni':
                $pizza = new PepperoniPizza($pizzaIngredientFactory);
                $pizza->setName('ChicagoPepperoniPizza');
                break;
            case 'veggie':
                $pizza = new VeggiePizza($pizzaIngredientFactory);
                $pizza->setName('ChicagoVeggiePizza');
                break;
        }
        return $pizza;
    }
}
