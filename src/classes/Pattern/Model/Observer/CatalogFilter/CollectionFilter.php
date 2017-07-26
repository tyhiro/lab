<?php
namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Class CollectionFilter
 * Фильтр для поборок по бренду и категории
 * @package Pattern\Observer\CatalogFilter
 */
class CollectionFilter extends AbstractFilter
{
    static private $instance = null;
    /** @var  string $brand */
    private $brand;
    /** @var  string $category */
    private $category;

    private function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        $this->notify();
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
        $this->notify();
    }

    /**
     * {@inheritdoc}
     */
    public function getFilterParams()
    {
        return [
            'brand' => $this->brand,
            'category' => $this->category
        ];
    }
}