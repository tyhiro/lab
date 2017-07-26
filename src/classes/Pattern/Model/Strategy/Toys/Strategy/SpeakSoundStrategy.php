<?php

namespace Pattern\Model\Strategy\Toys\Strategy;

/**
 * Класс, реализующий способность объекта говорить
 * Class TalkSoundStrategy
 * @package Pattern\Model\Strategy\Toys\Strategy
 */
class SpeakSoundStrategy implements SoundInterface
{
    /**
     * {@inheritdoc}
     */
    public function makeSound()
    {
        print_r('Imitation of speaking<br>');
    }
}
