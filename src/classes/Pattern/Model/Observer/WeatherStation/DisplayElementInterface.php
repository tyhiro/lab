<?php
namespace Pattern\Model\Observer\WeatherStation;

/**
 * Интерфейс визуального отображения температуры
 * Interface DisplayElementInterface
 * @package Pattern\Model\Observer\WeatherStation
 */
interface DisplayElementInterface
{
    /**
     * Отображение данных
     * @return mixed
     */
    public function display();
}
