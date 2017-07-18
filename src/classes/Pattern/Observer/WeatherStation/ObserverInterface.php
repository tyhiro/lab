<?php
namespace Pattern\Observer\WeatherStation;

/**
 * Интерфейс подписчика
 * Interface ObserverInterface
 * @package Pattern\Observer\WeatherStation
 */
interface ObserverInterface
{
    /**
     * Обновление данных состояния
     * @param float temperature - температура
     * @param float $humidity - влажность
     * @param float $pressure - атмосферное давление
     * @return mixed
     */
    public function update($temperature, $humidity, $pressure);
}
