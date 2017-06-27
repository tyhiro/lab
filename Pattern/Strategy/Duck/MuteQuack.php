<?php

namespace Pattern\Strategy\Duck;

/**
 * Класс, реализующий заглушку для крякания
 * Class MuteQuack
 * @package Strategy\Duck
 */

class MuteQuack implements QuackBehavior
{
    /**
     * {@inheritdoc}
     */
    public function quack()
    {
        echo 'mute Quack';
    }
}
