<?php
namespace Pattern\Model\Observer\CatalogFilter;

/**
 * Подборка новинок
 * Class Novelty
 * @package Pattern\Observer\CatalogFilter
 */
class Novelty implements ProductInterface
{
    /** @var array $filterQuery */
    private $filterQuery = [];

    /**
     * Novelty constructor.
     * @param FilterInterface $filter
     */
    public function __construct(FilterInterface $filter)
    {
        $filter->attach($this);
    }

    /**
     * Отображает товары
     * @return mixed
     */
    public function render()
    {
        echo sprintf(
            "Novelty filtered by  %s <br>",
            join(', ', $this->filterQuery)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function update(FilterInterface $filter)
    {
        $this->filterQuery = $filter->getFilterParams();
        $this->render();
    }
}
