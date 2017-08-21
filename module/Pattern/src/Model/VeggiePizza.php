<?php
namespace Pattern\Model;

/**
 * Class VeggiePizza
 * @package Pattern\Model
 */
class VeggiePizza extends Pizza
{
    public function prepare()
    {
        $this->dough = $this->ingredientFactory->createDough();
        $this->sauce = $this->ingredientFactory->createSauce();
        $this->veggies = $this->ingredientFactory->createVeggies();
        $this->cheese = $this->ingredientFactory->createCheese();

        $this->traceProcess[] = "Preparing: " . $this->name;
        $this->traceProcess[] = "Tossing dough: " . $this->dough->getName();
        $this->traceProcess[] = "Adding sauce: " . $this->sauce->getName();
        $this->traceProcess[] = "Adding cheese: " . $this->cheese->getName();

        $veggies = [];
        foreach ($this->veggies as $veggy) {
            $veggies[] = $veggy->getName();
        }

        $this->traceProcess[] = "Adding veggies: " . join(', ', $veggies);
    }
}
