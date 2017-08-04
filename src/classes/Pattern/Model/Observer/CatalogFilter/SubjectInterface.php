<?php

namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Interface SubjectInterface
 * @package Pattern\Model\Observer\CatalogFilter
 */
interface SubjectInterface
{
    /**
     * Подписывает наблюдателя на изменения состояния
     * @param ObserverInterface $observer
     * @return mixed
     */
    public function attach(ObserverInterface $observer);

    /**
     * Отменяет подписку
     * @param ObserverInterface $observer
     * @return mixed
     */
    public function detach(ObserverInterface $observer);

    /**
     * Оповещение подписчиков об изменении состояния
     * @return mixed
     */
    public function notify();
}
