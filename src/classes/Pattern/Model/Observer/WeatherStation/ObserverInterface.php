<?php
namespace Pattern\Model\Observer\WeatherStation;

/**
 * Интерфейс подписчика
 * Interface ObserverInterface
 * @package Pattern\Model\Observer\WeatherStation
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
