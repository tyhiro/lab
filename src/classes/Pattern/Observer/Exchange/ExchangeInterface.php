<?php
namespace Pattern\Observer\Exchange;

interface ExchangeInterface
{
    public function notify($obj);
}