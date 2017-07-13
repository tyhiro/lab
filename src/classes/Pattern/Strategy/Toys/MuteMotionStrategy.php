<?php

namespace Pattern\Strategy\Toys;

/**
 * Класс, реализующий заглушку для недвигающихся объектов
 * Class MuteMotionStrategy
 * @package Pattern\Strategy\Toys
 */
class MuteMotionStrategy implements MotionInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeMove()
    {
        //объект не двигается
    }
}
