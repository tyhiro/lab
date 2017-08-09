<?php
namespace Pattern\Model\Decorator\Starbuzz;

/**
 * Class DarkRoast
 * @package Pattern\Model\Decorator\Starbuzz
 */
class DarkRoast extends Beverage
{
    public function __construct()
    {
        parent::__construct();
        $this->description = 'DarkRoast';
    }

    /**
     * {@inheritdoc}
     */
    public function cost()
    {
        $cost = 0.99;
        switch ($this->getSize()) {
            case self::GRANDE:
                $cost += 0.2;
                break;
            case self::VENTI:
                $cost += 0.3;
                break;
        }
        return $cost;
    }
}