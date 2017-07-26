<?php

namespace Pattern\Model\Strategy\Toys\Strategy;
/**
 * Класс, реализующий способность объекта петь
 * Class SingSoundStrategy
 * @package Pattern\Model\Strategy\Toys\Strategy
 */
class SingSoundStrategy implements SoundInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeSound()
    {
        print_r('Imitation of singing<br>');
    }
}
