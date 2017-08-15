<?php
namespace Pattern\Model\Decorator\Formatter\Decorator;

use Pattern\Model\Decorator\Formatter\FormatterInterface;

/**
 * Class AbstractDecorator
 * @package Pattern\Model\Decorator\Starbuzz\Decorator
 */
abstract class AbstractDecorator implements FormatterInterface
{
    /** @var  FormatterInterface $formatter */
    protected $formatter;

    /**
     * AbstractDecorator constructor.
     * @param FormatterInterface $formatter
     */
    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * Returns the result of formatting $value
     *
     * @return string
     */
    abstract public function format();
}
