<?php
use \Pattern\Strategy\Toys\TankToy;
use \Pattern\Strategy\Toys\SingSoundStrategy;
use \Pattern\Observer\Exchange\ProductItem;
use \Pattern\Observer\Exchange\ExchangeRate;

$toy = new TankToy('Кукла Маша');
$toy->setName('Кукла ДАша');
$toy->sound();
echo "<br>";
$toy->setSoundOption(new SingSoundStrategy());
echo "<br>";
$toy->sound();
echo "<br>";
$toy->motion();
echo "<br>";
$product1 = new ProductItem();
$product2 = new ProductItem();

ExchangeRate::getInstance()->setExchangeRate(4.5);