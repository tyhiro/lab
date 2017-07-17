<?php

namespace Pattern\Strategy\Toys\Strategy;

/**
 * Класс, реализующий способность объекта ездить
 * Class WalkMotionStrategy
 * @package Pattern\Strategy\Toys
 */
class RideMotionStrategy implements MotionInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeMove()
    {
        print_r('Imitation of riding');
    }
}
