<?php

namespace Pattern\Model\Strategy\Toys\Strategy;

/**
 * Класс, реализующий заглушку для недвигающихся объектов
 * Class MuteMotionStrategy
 * @package Pattern\Model\Strategy\Toys\Strategy
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
