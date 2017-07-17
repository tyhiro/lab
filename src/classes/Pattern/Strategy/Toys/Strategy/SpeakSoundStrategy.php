<?php

namespace Pattern\Strategy\Toys\Strategy;

/**
 * Класс, реализующий способность объекта говорить
 * Class TalkSoundStrategy
 * @package Pattern\Strategy\Toys
 */
class SpeakSoundStrategy implements SoundInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeSound()
    {
        print_r('Imitation of speaking');
    }
}
