<?php

namespace Pattern\Strategy\Toys;

/**
 * Класс, реализующий способность объекта издавать звуки плача
 * Class CrySoundStrategy
 * @package Pattern\Strategy\Toys
 */
class CrySoundStrategy implements SoundInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeSound()
    {
        print_r('Imitation of crying');
    }
}
