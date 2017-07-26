<?php
namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Class AbstractFilter
 * @package Pattern\Observer\CatalogFilter
 */

abstract class AbstractFilter implements FilterInterface
{
    /** @var \SplObjectStorage $observers */
    protected $observers;

    /**
     * @inheritdoc
     */
    abstract public function getFilterParams();

    /**
     * Подписывает наблюдателя на изменения состояния
     * @param ObserverInterface $observer
     * @return mixed
     */
    public function attach(ObserverInterface $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * Отменяет подписку
     * @param ObserverInterface $observer
     * @return mixed
     */
    public function detach(ObserverInterface $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * Оповещение подписчиков об изменении состояния
     * @return mixed
     */
    public function notify()
    {
        /** @var ObserverInterface $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
