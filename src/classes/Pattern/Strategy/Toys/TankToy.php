<?php

namespace Pattern\Strategy\Toys;

/**
 * Класс, реализующий игрушку - танк
 * Class TankToy
 * @package Pattern\Strategy\Toys
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
        $this->soundOption = new EngineSoundStrategy();
        // танки ездят
        $this->motionOption = new RideMotionStrategy();
    }
}
