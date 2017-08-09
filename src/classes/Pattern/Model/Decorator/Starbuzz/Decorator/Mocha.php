<?php
namespace Pattern\Model\Decorator\Starbuzz\Decorator;

/**
 * Class Mocha
 * @package Pattern\Model\Decorator\Starbuzz\Decorator
 */
class Mocha extends AbstractDecorator
{
    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->beverage->getDescription() . ', Mocha';
    }

    /**
     * {@inheritdoc}
     */
    public function cost()
    {
        $cost = $this->beverage->cost();

        switch ($this->getSize()) {
            case self::GRANDE:
                $cost += 0.3;
                break;
            case self::VENTI:
                $cost += 0.4;
                break;
            default:
                $cost += 0.2;
        }

        return $cost;
    }
}
