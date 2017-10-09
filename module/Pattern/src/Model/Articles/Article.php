<?php
namespace Pattern\Model\Articles;

/**
 * Class Article
 * @package Pattern\Model\Articles
 */
class Article
{
    /** @var  string $name */
    private $name;
    /** @var  string $text */
    private $text;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}
