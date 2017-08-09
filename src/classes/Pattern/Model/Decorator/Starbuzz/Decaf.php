<?php
namespace Pattern\Model\Decorator\Starbuzz;

/**
 * Class Decaf
 * @package Pattern\Model\Decorator\Starbuzz
 */
class Decaf extends Beverage
{
    public function __construct()
    {
        parent::__construct();
        $this->description = 'Decaf';
    }

    /**
     * {@inheritdoc}
     */
    public function cost()
    {
        $cost = 1.05;
        switch ($this->size) {
            case self::GRANDE:
                $cost += 0.2;
                break;
            case self::VENTI:
                $cost += 0.2;
                break;
        }
        return $cost;
    }
}
