<?php

namespace Pattern\Strategy\Duck;

/**
 * Класс, реализующий обычное крякание
 * Class Quack
 * @package Strategy\Duck
 */
class Quack implements QuackBehavior
{
    /**
     * {@inheritdoc}
     */
    public function quack()
    {
        echo 'quack';
    }
}
