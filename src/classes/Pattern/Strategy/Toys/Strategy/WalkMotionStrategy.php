<?php

namespace Pattern\Strategy\Toys\Strategy;

/**
 * Класс, реализующий способность объекта ходить
 * Class WalkMotionStrategy
 * @package Pattern\Strategy\Toys
 */
class WalkMotionStrategy implements MotionInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeMove()
    {
        print_r('Imitation of walking');
    }
}
