<?php

namespace Pattern\Strategy\Duck;

/**
 * Класс, реализующий заглушку для полета для нелетающих объектов
 * Class FlyNoWay
 * @package Strategy\Duck
 */
class FlyNoWay implements FlyBehavior
{
    /**
     * {@inheritdoc}
     */
    public function fly()
    {
        echo 'flay no way';
    }
}
