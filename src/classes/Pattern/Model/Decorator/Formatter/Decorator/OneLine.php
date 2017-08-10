<?php
namespace Pattern\Model\Decorator\Formatter\Decorator;

/**
 * Class OneLine
 * @package Pattern\Model\Decorator\Formatter\Decorator
 */
class OneLine extends AbstractDecorator
{

    /**
     * Returns the result of formatting $value
     *
     * @return string
     */
    public function format()
    {
        return preg_replace('#([\n\r]{1,})#Usi', ' ', $this->formatter->format());
    }
}
