<?php
namespace Pattern\Observer\CatalogFilter;

/**
 * Class AbstractFilter
 * @package Pattern\Observer\CatalogFilter
 */
abstract class AbstractFilter implements FilterInterface
{
    /** @var ObserverInterface[] $observers */
    private $observers = array();

    /**
     * {@inheritdoc}
     */
    public function registerObserver(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * {@inheritdoc}
     */
    public function removeObserver(ObserverInterface $observer)
    {
        $key = array_search($observer, $this->observers);
        if ($key) {
            unset($this->observers[$key]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function notifyObserver()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getFilterParams()
    {
        return $this->buildFilter();
    }

    abstract protected function buildFilter();
}
