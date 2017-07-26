<?php
namespace Pattern\Model\Observer\Exchange;

class ExchangeRate
{
    static private $instance = NULL;
    private $observers = array();
    private $exchange_rate;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    static public function getInstance()
    {
        if (self::$instance == NULL) {
            self::$instance = new ExchangeRate();
        }
        return self::$instance;
    }

    public function getExchangeRate()
    {
        return $this->exchange_rate;
    }

    public function setExchangeRate($new_rate)
    {
        $this->exchange_rate = $new_rate;
        $this->notifyObservers();
    }

    public function registerObserver(ExchangeInterface $obj)
    {
        $this->observers[] = $obj;
    }

    function notifyObservers()
    {
        foreach ($this->observers as $obj) {
            $obj->notify($this);
        }
    }
}
