<?php

namespace Pattern\Strategy\Duck;

/**
 * Класс, реализующий утиный манок
 * Class ModelDuck
 * @package Strategy\Duck
 */
class ModelDuck extends Duck
{
    public function __construct()
    {
        // приманки не летают
        $this->flyBehavior = new FlyNoWay();
        // приманки не крякают
        $this->quackBehavior = new MuteQuack();
    }

    /**
     * {@inheritdoc}
     */
    public function display()
    {
        echo "I'm a model Duck";
    }
}
