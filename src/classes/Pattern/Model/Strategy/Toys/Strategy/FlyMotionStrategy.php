<?php

namespace Pattern\Model\Strategy\Toys\Strategy;

/**
 * Класс, реализующий способность объекта летать
 * Class WalkMotionStrategy
 * @package Pattern\Model\Strategy\Toys\Strategy
 */
class FlyMotionStrategy implements MotionInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeMove()
    {
        print_r('Imitation of flying<br>');
    }
}
