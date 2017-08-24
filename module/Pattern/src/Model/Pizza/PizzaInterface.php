<?php
namespace Pattern\Model\Pizza;

/**
 * Interface PizzaInterface
 * @package Pattern\Model
 */
interface PizzaInterface
{
    public function prepare();

    public function bake();

    public function cut();

    public function box();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * @return array
     */
    public function getTraceProcess();
}
