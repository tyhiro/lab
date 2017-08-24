<?php
namespace Pattern\Model\Pizza\Ingredients;

/**
 * Class Ingredient
 * @package Pattern\Model\Ingredients
 */
class Ingredient implements IngredientInterface
{
    protected $name = '';

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
