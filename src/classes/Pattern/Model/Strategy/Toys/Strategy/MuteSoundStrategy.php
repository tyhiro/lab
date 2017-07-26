<?php

namespace Pattern\Model\Strategy\Toys\Strategy;

/**
 * Класс, реализующий заглушку для беззвучных объектов
 * Class MuteSoundStrategy
 * @package Pattern\Model\Strategy\Toys\Strategy
 */
class MuteSoundStrategy implements SoundInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeSound()
    {
        // объект не издает звуков
    }
}
