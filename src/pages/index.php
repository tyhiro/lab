<?php
use \Pattern\Observer\Exchange\ProductItem;
use \Pattern\Observer\Exchange\ExchangeRate;

$product1 = new ProductItem();
$product2 = new ProductItem();

ExchangeRate::getInstance()->setExchangeRate(4.5);