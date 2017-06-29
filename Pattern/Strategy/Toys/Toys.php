<?php

namespace Pattern\Strategy\Toys;

/**
 * Класс реализующий игрушку с заданными опциями - звук, движение
 * Class Toys
 * @package Pattern\Strategy\Toys
 */
class Toys
{
    /** @var  string - имя игрушки */
    protected $name;
    /** @var  SoundInterface - способность издавать звуки */
    protected $soundOption;
    /** @var  MotionInterface - способность двигаться */
    protected $motionOption;

    /**
     * Toys constructor.
     * @param string $name - имя игрушки
     */
    public function __construct($name)
    {
        if (!trim($name)) {
            throw new \UnexpectedValueException('Не задано имя игрушки');
        }

        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Метод задает издаваемых звук
     * @param SoundInterface $soundOption
     */
    public function setSoundOption(SoundInterface $soundOption)
    {
        $this->soundOption = $soundOption;
    }

    /**
     * Метод задает способ движения
     * @param MotionInterface $motionOption
     */
    public function setMotionOption(MotionInterface $motionOption)
    {
        $this->motionOption = $motionOption;
    }

    /**
     * Метод реализует способность игрушки издавать звуки
     */
    public function sound()
    {
        $this->soundOption->makeSound();
    }

    /**
     * Метод реализует способность игрушки двигаться
     */
    public function motion()
    {
        $this->motionOption->makeMove();
    }
}
