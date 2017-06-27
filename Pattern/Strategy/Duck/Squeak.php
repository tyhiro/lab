<?php

namespace Pattern\Strategy\Duck;

/**
 * Класс, реализующий писк
 * Class Squeak
 * @package Strategy\Duck
 */

class Squeak implements QuackBehavior
{
    /**
     * {@inheritdoc}
     */
    public function quack()
    {
        echo 'squeak';
    }
}
