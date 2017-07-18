<?php
namespace Pattern\Observer\WeatherStation;

/**
 * Интерфейс визуального отображения температуры
 * Interface DisplayElementInterface
 * @package Pattern\Observer\WeatherStation
 */
interface DisplayElementInterface
{
    /**
     * Отображение данных
     * @return mixed
     */
    public function display();
}
