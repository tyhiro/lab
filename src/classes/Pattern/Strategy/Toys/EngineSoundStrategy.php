<?php

namespace Pattern\Strategy\Toys;

/**
 * Класс, реализующий способность объекта издавать звуки двигателя
 * Class EngineSoundStrategy
 * @package Pattern\Strategy\Toys
 */
class EngineSoundStrategy implements SoundInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeSound()
    {
        print_r('Imitation of engine sound');
    }
}
