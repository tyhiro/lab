<?php
namespace Pattern\Model;

/**
 * Class CheesePizza
 * @package Pattern\Model
 */
class CheesePizza extends Pizza
{
    public function prepare()
    {
        $this->dough = $this->ingredientFactory->createDough();
        $this->sauce = $this->ingredientFactory->createSauce();
        $this->cheese = $this->ingredientFactory->createCheese();

        $this->traceProcess[] = "Preparing: " . $this->name;
        $this->traceProcess[] = "Tossing dough: " . $this->dough->getName();
        $this->traceProcess[] = "Adding sauce: " . $this->sauce->getName();
        $this->traceProcess[] = "Adding cheese: " . $this->cheese->getName();
    }
}
