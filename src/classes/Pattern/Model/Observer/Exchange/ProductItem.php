<?php
namespace Pattern\Model\Observer\Exchange;

class ProductItem implements ExchangeInterface
{
    public function __construct()
    {
        ExchangeRate::getInstance()->registerObserver($this);
    }

    public function notify($obj)
    {
        if($obj instanceof ExchangeRate)
        {
            // Update exchange rate data
            print "Received update!\n";
        }
    }
}
