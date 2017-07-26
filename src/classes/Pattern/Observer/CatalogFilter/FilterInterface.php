<?php
namespace Pattern\Observer\CatalogFilter;

/**
 * Interface FilterInterface
 * @package Pattern\Observer\CatalogFilter
 */
interface FilterInterface
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

    /**
     * Вернет поля, по которым будут фильтроваться подборки
     * @return array
     */
    public function getFilterParams();
}