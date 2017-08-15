<?php

namespace Pattern\Model\Decorator\Formatter;

/**
 * Interface FormatterInterface
 * @package Pattern\Model\Decorator\Formatter
 */
interface FormatterInterface
{
    /**
     * Returns the result of formatting $value
     *
     * @return mixed
     */
    public function format();
}