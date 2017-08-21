<?php
namespace Pattern\Model;

/**
 * Class PepperoniPizza
 * @package Pattern\Model
 */
class PepperoniPizza extends Pizza
{
    public function prepare()
    {
        $this->dough = $this->ingredientFactory->createDough();
        $this->sauce = $this->ingredientFactory->createSauce();
        $this->pepperoni = $this->ingredientFactory->createPepperoni();
        $this->cheese = $this->ingredientFactory->createCheese();

        $this->traceProcess[] = "Preparing: " . $this->name;
        $this->traceProcess[] = "Tossing dough: " . $this->dough->getName();
        $this->traceProcess[] = "Adding sauce: " . $this->sauce->getName();
        $this->traceProcess[] = "Adding cheese: " . $this->cheese->getName();
        $this->traceProcess[] = "Adding pepperoni: " . $this->pepperoni->getName();
    }
}
