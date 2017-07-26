<?php

namespace Pattern\Model\Strategy\Toys;

/**
 * Класс, реализующий игрушку - танк
 * Class TankToy
 * @package Pattern\Model\Strategy\Toys
 */
class TankToy extends Toys
{
    /**
     * TankToy constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        // издает звук двигателя
        $this->soundOption = new Strategy\EngineSoundStrategy();
        // танки ездят
        $this->motionOption = new Strategy\RideMotionStrategy();
    }
}
