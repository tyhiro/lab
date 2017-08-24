<?php
namespace Pattern\Model\Pizza\Ingredients;

/**
 * Interface PizzaIngredientFactoryInterface
 * @package Pattern\Model\Ingredients
 */
interface PizzaIngredientFactoryInterface
{
    /**
     * @return IngredientInterface
     */
    public function createDough();

    /**
     * @return IngredientInterface
     */
    public function createSauce();

    /**
     * @return IngredientInterface
     */
    public function createCheese();

    /**
     * @return IngredientInterface[]
     */
    public function createVeggies();

    /**
     * @return IngredientInterface
     */
    public function createPepperoni();

    /**
     * @return IngredientInterface
     */
    public function createClams();
}
