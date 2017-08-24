<?php
namespace Pattern\Service\PizzaStore;

use Pattern\Model\Pizza\CheesePizza;
use Pattern\Model\Pizza\Ingredients\NYPizzaIngredientFactory;
use Pattern\Model\Pizza\PepperoniPizza;
use Pattern\Model\Pizza\VeggiePizza;

/**
 * Class NYPizzaStore
 * @package Pattern\Service\PizzaStore
 */
class NYPizzaStore extends AbstractPizzaStore
{
    /**
     * {@inheritdoc}
     */
    function createPizza($type)
    {
        $pizza = null;
        $pizzaIngredientFactory = new NYPizzaIngredientFactory();
        switch ($type) {
            case 'cheese':
                $pizza = new CheesePizza($pizzaIngredientFactory);
                $pizza->setName('NYCheesePizza');
                break;
            case 'pepperoni':
                $pizza = new PepperoniPizza($pizzaIngredientFactory);
                $pizza->setName('NYPepperoniPizza');
                break;
            case 'veggie':
                $pizza = new VeggiePizza($pizzaIngredientFactory);
                $pizza->setName('NYVeggiePizza');
                break;
        }
        return $pizza;
    }
}
