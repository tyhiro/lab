<?php

namespace Pattern\Model\Strategy\Toys\Strategy;

/**
 * Класс, реализующий способность объекта ездить
 * Class WalkMotionStrategy
 * @package Pattern\Model\Strategy\Toys\Strategy
 */
class RideMotionStrategy implements MotionInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeMove()
    {
        print_r('Imitation of riding<br>');
    }
}
