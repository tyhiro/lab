<?php
namespace Pattern\Model\Decorator\Starbuzz;


abstract class Beverage
{
    /** @var string $description */
    protected $description = 'Unknown Beverage';
    const TALL = 1;
    const GRANDE = 2;
    const VENTI = 3;

    protected $size;

    public function __construct()
    {
        $this->size = self::TALL;
    }

    /**
     * Метод расчитывает стоимость напитка
     * @return float
     */
    abstract public function cost();

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param string $size
     * @return Beverage
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }
}
