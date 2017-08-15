<?php
namespace Pattern\Model\Decorator\Formatter\Decorator;

/**
 * Class OneSpace
 * @package Pattern\Model\Decorator\Formatter\Decorator
 */
class OneSpace extends AbstractDecorator
{

    /**
     * Returns the result of formatting $value
     *
     * @return string
     */
    public function format()
    {
        return preg_replace('/ {2,}/', ' ', $this->formatter->format());
    }
}
