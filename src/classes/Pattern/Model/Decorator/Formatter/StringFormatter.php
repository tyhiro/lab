<?php

namespace Pattern\Model\Decorator\Formatter;

class StringFormatter implements FormatterInterface
{
    /** @var  string $value */
    protected $value;

    public function __construct($value)
    {
        $this->value=$value;
    }

    /**
     * Returns the result of formatting $value
     *
     * @return string
     */
    public function format()
    {
        return $this->value;
    }
}
