<?php

namespace Pattern\Model\Strategy\Toys;

/**
 * Класс, реализующий игрушку - кукла
 * Class DollToy
 * @package Pattern\Model\Strategy\Toys
 */
class DollToy extends Toys
{
    /**
     * DollToy constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        // кукла плачет
        $this->soundOption = new Strategy\CrySoundStrategy();
        // кукла не двигается
        $this->motionOption = new Strategy\MuteMotionStrategy();
    }
}
