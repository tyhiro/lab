<?php
namespace Pattern\Model\Pizza\Ingredients;

/**
 * Фабрика ингридиентов для пиццы в стиле Чикаго
 * Class PizzaIngredientFactory
 * @package Pattern\Model\Ingredients
 */
class ChicagoPizzaIngredientFactory implements PizzaIngredientFactoryInterface
{

    /**
     * @return IngredientInterface
     */
    public function createSauce()
    {
        return new MarinaraSauce();
    }

    /**
     * @return IngredientInterface
     */
    public function createCheese()
    {
        return new ReggianoCheese();
    }

    /**
     * @return IngredientInterface[]
     */
    public function createVeggies()
    {
        $veggies = [
            new Garlic(), new Onion(), new RedPepper()
        ];
        return $veggies;
    }

    /**
     * @return IngredientInterface
     */
    public function createPepperoni()
    {
        return new SlicedPepperoni();
    }

    /**
     * @return IngredientInterface
     */
    public function createClams()
    {
        return new FreshClams();
    }

    /**
     * @return IngredientInterface
     */
    public function createDough()
    {
        return new ThinCrustDough();
    }
}
