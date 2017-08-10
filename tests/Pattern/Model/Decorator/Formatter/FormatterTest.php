<?php
namespace Pattern\Model\Decorator\Formatter\Tests;

use Pattern\Model\Decorator\Formatter\Decorator\OneLine;
use Pattern\Model\Decorator\Formatter\Decorator\OneSpace;
use Pattern\Model\Decorator\Formatter\Decorator\StripTags;
use Pattern\Model\Decorator\Formatter\Decorator\Translit;
use Pattern\Model\Decorator\Formatter\FormatterInterface;
use Pattern\Model\Decorator\Formatter\StringFormatter;

class FormatterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getData
     * @param array $formats
     * @param string $result
     */
    public function testDecorator(array $formats, $result)
    {
        $string = <<<STRING
Каждый     охотник <br> 
<span> желает </span>  <?=знать?> 
где <?php сидит 'php' ?> фазан
STRING;

        /** @var FormatterInterface $beverageWithTaps */
        $formatString = new StringFormatter($string);

        foreach ($formats as $format) {
            $formatString = new $format($formatString);
        }
        self::assertEquals($formatString->format(), $result);
    }

    public function getData()
    {
        return [
            [
                [OneSpace::class, OneLine::class],
                $string = <<<STRING
Каждый охотник <br>  <span> желает </span> <?=знать?>  где <?php сидит 'php' ?> фазан
STRING
            ],
            [
                [StripTags::class],
                $string = <<<STRING
Каждый     охотник  
 желает    
где  фазан
STRING
            ],
            [
                [StripTags::class, OneLine::class, OneSpace::class, Translit::class],
                $string = <<<STRING
Kazhdyi okhotnik zhelaet gde fazan
STRING
            ],
        ];
    }
}
