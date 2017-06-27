<?php

namespace Pattern\Strategy\Duck;

/**
 * Класс, реализующий объект - Утка
 * Class Duck
 * @package Strategy\Duck
 */
abstract class Duck
{
    /** @var  FlyBehavior $flyBehavior - способность летать */
    protected $flyBehavior;
    /** @var  QuackBehavior $quackBehavior - способность крякать */
    protected $quackBehavior;

    /**
     * Метод для отображения утки на дисплее
     * @return mixed
     */
    public abstract function display();

    /**
     * Метод, реализующий крякание утки
     */
    public function performQuack()
    {
        $this->quackBehavior->quack();
    }

    /**
     * Метод, реализующий полет утки
     */
    public function performFlay()
    {
        $this->flyBehavior->fly();
    }

    /**
     * Метод реализует способность плавать. Все утки плавают одинаково
     */
    public function swim()
    {
        echo 'swim';
    }

    /**
     * Метод задает тип полета
     * @param FlyBehavior $flyBehavior
     */
    public function setFlyBehavior($flyBehavior)
    {
        $this->flyBehavior = $flyBehavior;
    }

    /**
     * Метод задает тип крякания
     * @param QuackBehavior $quackBehavior
     */
    public function setQuackBehavior($quackBehavior)
    {
        $this->quackBehavior = $quackBehavior;
    }
}
