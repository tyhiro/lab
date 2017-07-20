<?php
namespace Pattern\Observer\CatalogFilter;

use Pattern\SingleTon\SingletonTrait;

/**
 * Class CollectionFilter
 * Фильтр для поборок по бренду и категории
 * @package Pattern\Observer\CatalogFilter
 */
class CollectionFilter extends AbstractFilter
{
    use SingletonTrait;

    private $brand;
    private $category;

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        $this->notifyObserver();
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
        $this->notifyObserver();
    }

    /**
     * {@inheritdoc}
     */
    protected function buildFilter()
    {
        return [
            'brand' => $this->brand,
            'category' => $this->category
        ];
    }
}