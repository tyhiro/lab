<?php
namespace Pattern\Strategy\Duck;
/**
 * Interface FlyBehavior
 * Интерфейс, описывающий способы крякания
 */
interface QuackBehavior
{
    /**
     * Способ крякания
     * @return mixed
     */
    public function quack();
}
