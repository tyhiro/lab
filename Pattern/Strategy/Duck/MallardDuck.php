<?php

namespace Pattern\Strategy\Duck;

/**
 * Класс, реализующий крякающую утку
 * Class MallardDuck
 * @package Strategy\Duck
 */
class MallardDuck extends Duck
{
    public function __construct()
    {
        // обычные утки летают крыльями
        $this->flyBehavior = new FlayWithWings();
        // обычные утки крякают
        $this->quackBehavior = new Quack();
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        echo "I'm a mallardDuck";
    }
}
