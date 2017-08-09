<?php
namespace Pattern\Model\Decorator\Starbuzz\Decorator;

use Pattern\Model\Decorator\Starbuzz\Beverage;

/**
 * Class AbstractDecorator
 * @package Pattern\Model\Decorator\Starbuzz\Decorator
 */
abstract class AbstractDecorator extends Beverage
{
    /** @var  Beverage $beverage */
    protected $beverage;

    /**
     * AbstractDecorator constructor.
     * @param Beverage $beverage
     */
    public function __construct(Beverage $beverage)
    {
        parent::__construct();
        $this->beverage = $beverage;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->beverage->getSize();
    }
}
