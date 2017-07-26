<?php
namespace Pattern\Model\Observer\Exchange;

interface ExchangeInterface
{
    public function notify($obj);
}
