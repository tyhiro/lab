<?php

namespace Pattern\Strategy\Toys;

/**
 * Класс, реализующий заглушку для беззвучных объектов
 * Class MuteSoundStrategy
 * @package Pattern\Strategy\Toys
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
