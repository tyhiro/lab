<?php

namespace Pattern\Model\Decorator\Starbuzz\Tests;

use Pattern\Model\Decorator\Starbuzz\Beverage;
use Pattern\Model\Decorator\Starbuzz\Decaf;
use Pattern\Model\Decorator\Starbuzz\DarkRoast;
use Pattern\Model\Decorator\Starbuzz\Decorator\Mocha;
use Pattern\Model\Decorator\Starbuzz\Decorator\Whip;

/**
 * Class StarbuzzTest
 * @package Pattern\Model\Decorator\Starbuzz\Tests
 */
class StarbuzzTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getData
     * @param string $class
     * @param array $taps
     * @param int $size
     * @param float $cost
     * @param string $description
     */
    public function testMochaAndWhipDecorator($class, array $taps, $size, $cost, $description)
    {
        /** @var Beverage $beverageWithTaps */
        $beverageWithTaps = new $class;
        $beverageWithTaps->setSize($size);
        foreach ($taps as $tap) {
            $beverageWithTaps = new $tap($beverageWithTaps);
        }
        self::assertEquals($cost, $beverageWithTaps->cost());
        self::assertEquals($description, $beverageWithTaps->getDescription());
    }

    public function getData()
    {
        return [
            [Decaf::class, [Mocha::class, Whip::class], Beverage::GRANDE, 1.75, "Decaf, Mocha, Whip"],
            [Decaf::class, [Mocha::class, Whip::class], Beverage::TALL, 1.35, "Decaf, Mocha, Whip"],
            [Decaf::class, [Mocha::class, Whip::class], Beverage::VENTI, 1.95, "Decaf, Mocha, Whip"],
            [DarkRoast::class, [Whip::class], Beverage::TALL, 1.09, "DarkRoast, Whip"],
            [DarkRoast::class, [Mocha::class, Whip::class], Beverage::GRANDE, 1.69, "DarkRoast, Mocha, Whip"],
            [DarkRoast::class, [Whip::class], Beverage::VENTI, 1.59, "DarkRoast, Whip"]
        ];
    }
}