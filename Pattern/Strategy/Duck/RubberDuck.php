<?php

namespace Pattern\Strategy\Duck;

/**
 * Класс, реализующий резиновую утку
 * Class MallardDuck
 * @package Strategy\Duck
 */
class RubberDuck extends Duck
{
    public function __construct()
    {
        // резиновые утки не летают
        $this->flyBehavior = new FlyNoWay();
        // резиновые утки пищат
        $this->quackBehavior = new Squeak();
    }
    /**
     * {@inheritdoc}
     */
    public function display()
    {
        echo "I'm a rubber duck";
    }
}
