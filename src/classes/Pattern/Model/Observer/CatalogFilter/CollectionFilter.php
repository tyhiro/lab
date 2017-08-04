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

    /**
     * CollectionFilter constructor.
     */
    private function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    /**
     * Define __clone as final and private to dissallow cloning.
     *
     * @codeCoverageIgnore
     */
    final private function __clone()
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
     * {@inheritdoc}
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        $this->notify();
    }

    /**
     * {@inheritdoc}
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
            'brand'    => $this->brand,
            'category' => $this->category
        ];
    }
}
