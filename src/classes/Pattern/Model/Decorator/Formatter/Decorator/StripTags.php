<?php
namespace Pattern\Model\Decorator\Formatter\Decorator;

/**
 * Class StripTags
 * @package Pattern\Model\Decorator\Formatter\Decorator
 */
class StripTags extends AbstractDecorator
{

    /**
     * Returns the result of formatting $value
     *
     * @return string
     */
    public function format()
    {
        return strip_tags($this->formatter->format());
    }
}
