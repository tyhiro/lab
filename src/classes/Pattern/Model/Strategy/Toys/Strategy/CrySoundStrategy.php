<?php

namespace Pattern\Model\Strategy\Toys\Strategy;

/**
 * Класс, реализующий способность объекта издавать звуки плача
 * Class CrySoundStrategy
 * @package Pattern\Model\Strategy\Toys\Strategy
 */
class CrySoundStrategy implements SoundInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeSound()
    {
        print_r('Imitation of crying<br>');
    }
}
