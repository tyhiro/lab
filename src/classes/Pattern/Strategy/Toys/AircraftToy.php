<?php

namespace Pattern\Strategy\Toys;

/**
 * Класс, реализующий игрушку - самолет
 * Class AircraftToy
 * @package Pattern\Strategy\Toys
 */
class AircraftToy extends Toys
{
    /**
     * AircraftToy constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        // издает звук двигателя
        $this->soundOption = new Strategy\EngineSoundStrategy();
        // самолеты летают
        $this->motionOption = new Strategy\FlyMotionStrategy();
    }
}
