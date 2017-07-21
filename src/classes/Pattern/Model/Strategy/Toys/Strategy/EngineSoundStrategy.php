<?php

namespace Pattern\Model\Strategy\Toys\Strategy;

/**
 * Класс, реализующий способность объекта издавать звуки двигателя
 * Class EngineSoundStrategy
 * @package Pattern\Model\Strategy\Toys\Strategy
 */
class EngineSoundStrategy implements SoundInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeSound()
    {
        print_r('Imitation of engine sound<br>');
    }
}
