<?php
namespace Pattern\Model\Decorator\Starbuzz\Decorator;

/**
 * Class Whip
 * @package Pattern\Model\Decorator\Starbuzz\Decorator
 */
class Whip extends AbstractDecorator
{
    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->beverage->getDescription() . ', Whip';
    }

    /**
     * {@inheritdoc}
     */
    public function cost()
    {
        $cost = $this->beverage->cost();

        switch ($this->getSize()) {
            case self::GRANDE:
                $cost += 0.2;
                break;
            case self::VENTI:
                $cost += 0.3;
                break;
            default:
                $cost += 0.1;
        }

        return $cost;
    }
}
