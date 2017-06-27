<?php

namespace Pattern\Strategy\Duck;

/**
 * Класс, реализующий полет крыльями
 * Class FlayWithWings
 * @package Strategy\Duck
 */
class FlayWithWings implements FlyBehavior
{
    /**
     * {@inheritdoc}
     */
    public function fly()
    {
        echo 'flay with wings';
    }
}
