<?php
namespace Pattern\Model\Ingredients;

/**
 * Фабрика ингридиентов для пиццы в Нью-Йоркском стиле
 * Class NYPizzaIngredientFactory
 * @package Pattern\Model\Ingredients
 */
class NYPizzaIngredientFactory implements PizzaIngredientFactoryInterface
{
    /**
     * @return IngredientInterface
     */
    public function createDough()
    {
        return new ThickCrusDough();
    }

    /**
     * @return IngredientInterface
     */
    public function createSauce()
    {
        return new PlumTomatoSauce();
    }

    /**
     * @return IngredientInterface
     */
    public function createCheese()
    {
        return new MozzarellaCheese();
    }

    /**
     * @return IngredientInterface[]
     */
    public function createVeggies()
    {
        $veggies = [
            new BlackOlives(), new Onion(), new Spinach()
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
        return new FrozenClams();
    }
}
