<?php

namespace Pattern\Strategy\Duck;
/**
 * Interface FlyBehavior
 * Интерфейс, описывающий способы полета
 */
interface FlyBehavior
{
    /**
     * Способ полета
     * @return mixed
     */
    public function fly();
}