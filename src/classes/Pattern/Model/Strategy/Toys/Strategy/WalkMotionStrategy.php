<?php

namespace Pattern\Model\Strategy\Toys\Strategy;

/**
 * Класс, реализующий способность объекта ходить
 * Class WalkMotionStrategy
 * @package Pattern\Model\Strategy\Toys\Strategy
 */
class WalkMotionStrategy implements MotionInterface
{

    /**
     * {@inheritdoc}
     */
    public function makeMove()
    {
        print_r('Imitation of walking<br>');
    }
}
