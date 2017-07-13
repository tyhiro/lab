<?php

namespace Pattern\Strategy\Toys;

/**
 * Класс, реализующий игрушку - кукла
 * Class DollToy
 * @package Pattern\Strategy\Toys
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
        $this->soundOption = new CrySoundStrategy();
        // кукла не двигается
        $this->motionOption = new MuteMotionStrategy();
    }
}
