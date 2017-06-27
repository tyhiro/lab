<?php

namespace Pattern\Strategy\Duck;

/**
 * Класс, реализующий полет на ракетной тяге
 * Class FlyRocketPowered
 * @package Strategy\Duck
 */
class FlyRocketPowered implements FlyBehavior
{
    /**
     * {@inheritdoc}
     */
    public function fly()
    {
        echo 'i am flying with a rocket!';
    }
}
