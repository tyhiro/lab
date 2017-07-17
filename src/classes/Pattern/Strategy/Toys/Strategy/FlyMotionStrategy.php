<?php

namespace Pattern\Strategy\Toys\Strategy;

/**
 * Класс, реализующий способность объекта летать
 * Class WalkMotionStrategy
 * @package Pattern\Strategy\Toys
 */
class FlyMotionStrategy implements MotionInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeMove()
    {
        print_r('Imitation of flying');
    }
}
