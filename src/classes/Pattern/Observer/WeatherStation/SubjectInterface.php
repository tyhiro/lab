<?php
namespace Pattern\Observer\WeatherStation;

/**
 * Интерфейс субъекта
 * Interface SubjectInterface
 * @package Pattern\Observer\WeatherStation
 */
interface SubjectInterface
{
    /**
     * Подписывает наблюдателя на изменения состояния
     * @param ObserverInterface $observer
     * @return mixed
     */
    public function registerObserver(ObserverInterface $observer);

    /**
     * Отменяет подписку
     * @param ObserverInterface $observer
     * @return mixed
     */
    public function removeObserver(ObserverInterface $observer);

    /**
     * Оповещение подписчиков об изменении состояния
     * @return mixed
     */
    public function notifyObserver();
}
