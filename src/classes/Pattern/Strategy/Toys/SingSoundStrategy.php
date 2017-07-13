<?php

namespace Pattern\Strategy\Toys;

/**
 * Класс, реализующий способность объекта петь
 * Class SingSoundStrategy
 * @package Pattern\Strategy\Toys
 */
class SingSoundStrategy implements SoundInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeSound()
    {
        print_r('Imitation of singing');
    }
}
